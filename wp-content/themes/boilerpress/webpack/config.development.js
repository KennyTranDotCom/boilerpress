const ESLintPlugin = require('eslint-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');

module.exports = (boilerpressOptions) => {
    process.env.NODE_ENV = 'development';

    const { boilerpressPaths, boilerpressSettings } = boilerpressOptions;
    const Base = require('./config.base')(boilerpressOptions);

    const images = {
        ...Base.images,
        ...{
            // add images rules for development here
        },
    };

    const scripts = {
        ...Base.scripts,
        ...{
            // add scripts rules for development here
        },
    };

    const styles = {
        ...Base.styles,
        ...{
            // add styles rules for development here
        },
    };

    const optimizations = {
        ...Base.optimizations,
        ...{
            // add optimizations rules for development here
        },
    };

    const plugins = [
        ...Base.plugins,
        ...[new ESLintPlugin(), new StylelintPlugin()],
    ];

    return {
        mode: 'development',
        entry: [
            boilerpressSettings.scripts.entry.main,
            boilerpressSettings.styles.entry.main,
        ],
        output: {
            path: boilerpressPaths.output,
            filename: boilerpressSettings.scripts.filename,
        },
        devtool: false,
        optimization: optimizations,
        module: {
            rules: [images, scripts, styles],
        },
        plugins: plugins,
    };
};

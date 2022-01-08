const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = (boilerpressOptions) => {
    process.env.NODE_ENV = 'production';

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
            // add optimizations rules for production here
        },
    };

    const plugins = [
        ...Base.plugins,
        ...[
            new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: ['images/compressed/*'],
                verbose: true,
            }),

            // add plugins for production here
        ],
    ];

    return {
        mode: 'production',
        entry: [
            boilerpressSettings.scripts.entry.main,
            boilerpressSettings.styles.entry.main,
        ],
        output: {
            path: boilerpressPaths.output,
            filename: boilerpressSettings.scripts.filename,
        },
        devtool: boilerpressSettings.sourceMaps.devtool,
        optimization: optimizations,
        module: {
            rules: [images, scripts, styles],
        },
        plugins: plugins,
    };
};

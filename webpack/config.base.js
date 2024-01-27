const MagicImporter = require('node-sass-magic-importer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackBar = require('webpackbar');

module.exports = (settings) => {
    const { BOILERPRESS_PATHS } = settings;

    const images = {
        test: settings.images.rules.test,
        use: [
            {
                loader: 'file-loader',
            },
        ],
    };

    const scripts = {
        exclude: /(node_modules|bower_components|vendor)/,
        include: settings.scripts.include,
        test: settings.scripts.rules.test,
        use: 'babel-loader',
    };

    const styles = {
        exclude: /(node_modules|bower_components|vendor)/,
        use: [
            MiniCssExtractPlugin.loader,
            {
                loader: 'css-loader',
                options: {
                    url: false,
                },
            },
            {
                loader: 'postcss-loader',
                options: require(
                    BOILERPRESS_PATHS.webpack + '/postcss.config.js'
                )(),
            },
            {
                loader: 'sass-loader',
                options: {
                    sassOptions: { importer: MagicImporter() },
                },
            },
        ],
        test: settings.styles.rules.test,
    };

    const optimizations = {};

    const plugins = [
        new WebpackBar(),
        new MiniCssExtractPlugin({
            filename: settings.styles.filename,
        }),
    ];

    return {
        images,
        optimizations,
        plugins,
        scripts,
        styles,
    };
};

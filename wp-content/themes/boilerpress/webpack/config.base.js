const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');
const MagicImporter = require('node-sass-magic-importer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackBar = require('webpackbar');

module.exports = (boilerpressOptions) => {
    const { boilerpressPaths, boilerpressSettings } = boilerpressOptions;

    const images = {
        test: boilerpressSettings.images.rules.test,
        use: [
            {
                loader: 'file-loader',
            },
        ],
    };

    const scripts = {
        exclude: /(node_modules|bower_components|vendor)/,
        include: boilerpressPaths.scripts,
        test: boilerpressSettings.scripts.rules.test,
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
                options: require(boilerpressPaths.webpack +
                    '/postcss.config.js')(),
            },
            {
                loader: 'sass-loader',
                options: {
                    sassOptions: { importer: MagicImporter() },
                },
            },
        ],
        test: boilerpressSettings.styles.rules.test,
    };

    const optimizations = {};

    const plugins = [
        new WebpackBar(),
        new BrowserSyncPlugin(
            {
                browser: boilerpressSettings.browserSync.browser,
                files: boilerpressSettings.browserSync.files,
                host: boilerpressSettings.browserSync.host,
                mode: boilerpressSettings.browserSync.mode,
                port: boilerpressSettings.browserSync.port,
                proxy: boilerpressSettings.browserSync.proxy,
            },
            {
                reload: true,
            }
        ),
        new CopyPlugin({
            patterns: [
                {
                    from: boilerpressPaths.images,
                    to: boilerpressPaths.images + '/compressed',
                    globOptions: {
                        ignore: ['**/compressed/**'],
                    },
                },
            ],
        }),
        new ImageMinimizerPlugin({
            minimizerOptions: {
                plugins: [
                    ['gifsicle', { interlaced: true }],
                    ['jpegtran', { progressive: true }],
                    ['optipng', { optimizationLevel: 5 }],
                    [
                        'svgo',
                        {
                            plugins: [{ removeViewBox: false }],
                        },
                    ],
                ],
            },
        }),
        new MiniCssExtractPlugin({
            filename: boilerpressSettings.styles.filename,
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

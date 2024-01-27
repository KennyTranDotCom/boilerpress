const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = (settings) => {
    process.env.NODE_ENV = 'production';

    const { BOILERPRESS_PATHS, BOILERPRESS_SETTINGS_BASE } = settings;
    const Base = require('./config.base')(settings);

    const images = {
        ...Base.images,
        ...{
            // add images rules for production here
        },
    };

    const scripts = {
        ...Base.scripts,
        ...{
            // add scripts rules for production here
        },
    };

    const styles = {
        ...Base.styles,
        ...{
            // add styles rules for production here
        },
    };

    const optimizations = {
        ...Base.optimizations,
        ...{
            minimizer: [
                new CssMinimizerPlugin(),
                new ImageMinimizerPlugin({
                    minimizer: {
                        implementation: ImageMinimizerPlugin.imageminMinify,
                        options: {
                            plugins: [
                                ['gifsicle', { interlaced: true }],
                                ['jpegtran', { progressive: true }],
                                ['optipng', { optimizationLevel: 5 }],
                                [
                                    'svgo',
                                    {
                                        plugins: [
                                            {
                                                name: 'preset-default',
                                                params: {
                                                    overrides: {
                                                        removeViewBox: false,
                                                        addAttributesToSVGElement:
                                                            {
                                                                params: {
                                                                    attributes:
                                                                        [
                                                                            {
                                                                                xmlns: 'http://www.w3.org/2000/svg',
                                                                            },
                                                                        ],
                                                                },
                                                            },
                                                    },
                                                },
                                            },
                                        ],
                                    },
                                ],
                            ],
                        },
                    },
                }),
                new TerserPlugin(),
            ],

            // add optimizations rules for production here
        },
    };

    const plugins = [
        ...Base.plugins,
        ...[
            new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: [BOILERPRESS_PATHS.build + '/*'],
                verbose: true,
            }),

            new CopyPlugin({
                patterns: [
                    {
                        from: BOILERPRESS_PATHS.fonts,
                        to: BOILERPRESS_PATHS.build + '/fonts',
                        noErrorOnMissing: true,
                    },
                    {
                        from: BOILERPRESS_PATHS.images,
                        to: BOILERPRESS_PATHS.build + '/images',
                        noErrorOnMissing: true,
                    },
                ],
            }),

            // add plugins for production here
        ],
    ];

    return {
        mode: process.env.NODE_ENV,
        entry: settings.scripts.entry,
        output: {
            path: settings.scripts.output,
            filename: settings.scripts.filename,
        },
        devtool: BOILERPRESS_SETTINGS_BASE.sourceMaps.devtool,
        optimization: optimizations,
        module: {
            rules: [images, scripts, styles],
        },
        plugins: plugins,
    };
};

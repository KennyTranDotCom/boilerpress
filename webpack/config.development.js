const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin');
const ESLintPlugin = require('eslint-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');

module.exports = (settings) => {
    process.env.NODE_ENV = 'development';

    const { BOILERPRESS_PATHS, BOILERPRESS_SETTINGS_BASE } = settings;
    const Base = require('./config.base')(settings);

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
        ...[
            new BrowserSyncPlugin(
                {
                    browser: BOILERPRESS_SETTINGS_BASE.browserSync.browser,
                    files: BOILERPRESS_SETTINGS_BASE.browserSync.files,
                    host: BOILERPRESS_SETTINGS_BASE.browserSync.host,
                    mode: BOILERPRESS_SETTINGS_BASE.browserSync.mode,
                    port: BOILERPRESS_SETTINGS_BASE.browserSync.port,
                    proxy: BOILERPRESS_SETTINGS_BASE.browserSync.proxy,
                },
                {
                    reload: true,
                }
            ),

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

            new ESLintPlugin(),

            new StylelintPlugin(),

            // add plugins rules for development here
        ],
    ];

    return {
        mode: process.env.NODE_ENV,
        entry: settings.scripts.entry,
        output: {
            path: settings.scripts.output,
            filename: settings.scripts.filename,
        },
        devtool: false,
        optimization: optimizations,
        module: {
            rules: [images, scripts, styles],
        },
        plugins: plugins,
    };
};

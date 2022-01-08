const path = require('path');

const boilerpressPaths = {
    directory: __dirname,
    output: path.resolve(__dirname, 'assets'),
    fonts: path.resolve(__dirname, 'assets/fonts'),
    images: path.resolve(__dirname, 'assets/images'),
    scripts: path.resolve(__dirname, 'assets/scripts'),
    styles: path.resolve(__dirname, 'assets/styles'),
    webpack: path.resolve(__dirname, 'webpack'),
};

const boilerpressSettings = {
    browserSync: {
        browser: 'google chrome',
        files: ['**/**/**.php', '**/**/**.twig'],
        host: 'localhost',
        mode: 'proxy',
        port: 3000,
        proxy: 'http://dev.boilerpress.io',
    },

    images: {
        rules: {
            test: /\.(jpe?g|png|gif|svg)$/i,
        },
    },

    scripts: {
        entry: {
            main: boilerpressPaths.scripts + '/main/main.js',
        },
        filename: 'scripts/[name].min.js',
        rules: {
            test: /\.m?js$/,
        },
    },

    styles: {
        entry: {
            main: boilerpressPaths.styles + '/main/main.scss',
        },
        filename: 'styles/[name].min.css',
        rules: {
            test: /\.s[ac]ss$/i,
        },
    },

    sourceMaps: {
        devtool: 'source-map',
    },
};

const boilerpressOptions = {
    boilerpressPaths,
    boilerpressSettings,
};

module.exports = (env) => {
    if (env.NODE_ENV === 'production') {
        return require('./webpack/config.production')(boilerpressOptions);
    } else {
        return require('./webpack/config.development')(boilerpressOptions);
    }
};

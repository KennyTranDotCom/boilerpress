const path = require('path');

const BOILERPRESS_URLS = {
    development: 'https://kennytran.local'
}

const BOILERPRESS_PATHS = {
    directory: path.join(__dirname, '..'),
    build: path.join(__dirname, '..', 'build'),
    src: path.join(__dirname, '..', 'src'),
    fonts: path.join(__dirname, '..', 'src/fonts'),
    images: path.join(__dirname, '..', 'src/images'),
    scripts: path.join(__dirname, '..', 'src/scripts'),
    styles: path.join(__dirname, '..', 'src/styles'),
    webpack: path.join(__dirname, '..', 'webpack'),
};

const BOILERPRESS_SETTINGS_BASE = {
    browserSync: {
        browser: 'google chrome',
        files: ['**/**/**.php', '**/**/**.scss', '**/**/**.js'],
        host: 'localhost',
        mode: 'proxy',
        port: 3000,
        proxy: BOILERPRESS_URLS.development,
    },

    sourceMaps: {
        devtool: 'source-map',
    },
};

const BOILERPRESS_SETTINGS_SRC = {
    BOILERPRESS_PATHS,
    BOILERPRESS_SETTINGS_BASE,
    ...{
        images: {
            rules: {
                test: /\.(jpe?g|png|gif|svg)$/i,
            },
        },

        scripts: {
            include:  BOILERPRESS_PATHS.scripts,
            entry: {
                'theme': BOILERPRESS_PATHS.scripts + '/theme.js',
                'editor': BOILERPRESS_PATHS.scripts + '/editor.js',
                'block-editor': BOILERPRESS_PATHS.scripts + '/block-editor.js',
            },
            output: BOILERPRESS_PATHS.directory,
            filename: 'build/[name].min.js',
            rules: {
                test: /\.m?js$/,
            },
        },
    
        styles: {
            filename: 'build/[name].min.css',
            rules: {
                test: /\.s[ac]ss$/i,
            },
        }
    },
};

module.exports = (env) => {
    if (env.NODE_ENV === 'production') {
        const src = require('./config.production')(
            BOILERPRESS_SETTINGS_SRC
        );

        return [src];
    } else {
        const src = require('./config.development')(
            BOILERPRESS_SETTINGS_SRC
        );

        return [src];
    }
};

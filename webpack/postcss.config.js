module.exports = () => {
    const postcssOptions = {};

    Object.assign(postcssOptions, {
        plugins: [require('autoprefixer')],
    });

    return { postcssOptions: postcssOptions };
};

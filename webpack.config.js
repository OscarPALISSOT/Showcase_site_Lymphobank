const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addStyleEntry('scss/base', './assets/styles/base.scss')
    .addStyleEntry('scss/admin', './assets/styles/admin/admin.scss')
    .addStyleEntry('scss/home', './assets/styles/home.scss')
    .addStyleEntry('scss/pourquoi', './assets/styles/pourquoi.scss')
    .addStyleEntry('scss/cestQuoi', './assets/styles/cestQuoi.scss')
    .addStyleEntry('scss/faq', './assets/styles/faq.scss')
    .addStyleEntry('scss/comment', './assets/styles/comment.scss')
    .addStyleEntry('scss/login', './assets/styles/login.scss')
    .addStyleEntry('scss/monEspace', './assets/styles/admin/monEspace.scss')
    .addStyleEntry('scss/ou', './assets/styles/ou.scss')
    .addStyleEntry('scss/map', './assets/styles/map.scss')
    .addStyleEntry('scss/about', './assets/styles/about.scss')
    .addStyleEntry('scss/quand', './assets/styles/quand.scss')
    .addStyleEntry('scss/tooltip', './assets/styles/tooltip.scss')
    .addStyleEntry('scss/accordeon', './assets/styles/accordeon.scss')
    .addStyleEntry('scss/card', './assets/styles/card.scss')
    .addStyleEntry('scss/carousel', './assets/styles/carousel.scss')
    .addStyleEntry('scss/cardActu', './assets/styles/cardActu.scss')
    .addStyleEntry('scss/pagination', './assets/styles/pagination.scss')
    .addStyleEntry('scss/paginationAdmin', './assets/styles/paginationAdmin.scss')
    .addStyleEntry('scss/schemaTooltip', './assets/styles/schemaTooltip.scss')
    .addStyleEntry('scss/contact', './assets/styles/contact.scss')
    .addStyleEntry('scss/partenaires', './assets/styles/partenaires.scss')

    .addEntry('js/base', './assets/js/base.js')
    .addEntry('js/map', './assets/js/map.js')
    .addEntry('js/addAdmin', './assets/js/addAdmin.js')
    .addEntry('js/carousel', './assets/js/carousel.js')
    .addEntry('js/btnFaq', './assets/js/btnFaq.js')
    .addEntry('js/btnCard', './assets/js/btnCard.js')
    .addEntry('js/accordeon', './assets/js/accordeon.js')
    .addEntry('js/schemaDon', './assets/js/schemaDon.js')

    // enables the Symfony UX Stimulus bridge (used in assets/bootstrap.js)
    .enableStimulusBridge('./assets/controllers.json')

    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-proposal-class-properties');
    })

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })

    // enables Sass/SCSS support
    .enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use React
    //.enableReactPreset()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();

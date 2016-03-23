WebFont.load({
    google: {
      families: ["Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Great Vibes:400","Open Sans:300,400,600,700,800"]
    }
});

// $('.ui.dropdown').dropdown();
$('#header').height($('#navegador').height());
$('#navegador').affix({ offset: { top: $('#navegador').offset.top } });



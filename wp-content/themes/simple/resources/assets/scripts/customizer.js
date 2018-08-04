import $ from 'jquery';

wp.customize('blogname', (value) => {
  value.bind(to => $('.brand').text(to));
});

wp.customize('themefonts', (value) => {
  value.bind(to => $('body').attr('data-font', to));
});

wp.customize('themecolor', (value) => {
  value.bind(to => $('body').attr('data-color', to));
});

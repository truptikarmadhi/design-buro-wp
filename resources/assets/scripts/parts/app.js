export class App {
  init() {
   jQuery(document).ready(function($){
    $('.wpcf7-form').attr('autocomplete','off');
    $('.wpcf7-form input, .wpcf7-form textarea').attr('autocomplete','off');
});
  }
}

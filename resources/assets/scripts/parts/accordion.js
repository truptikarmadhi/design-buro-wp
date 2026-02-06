export class Accordion {
    init() {
        this.Accordion();
    }
    Accordion() {
        $(document).ready(function () {
            // Open the first child by default
            $('.closet-header').first().addClass('active')
                .closest('.closet-item')
                .addClass('closet-active')
                .find('.closet-content')
                .slideDown();

            $('.closet-header').on('click', function () {

                const $item = $(this).closest('.closet-item');

                // Toggle current item
                $item.toggleClass('closet-active');
                $(this).toggleClass('active');
                $item.find('.closet-content')
                    .stop(true, true)
                    .slideToggle();

                // Close others
                $('.closet-item').not($item).removeClass('closet-active')
                    .find('.closet-header').removeClass('active')
                    .end()
                    .find('.closet-content')
                    .stop(true, true)
                    .slideUp();
            });

        });
    }
}
<?php

use App\ProductBuilder;

/*
 * Your work begins on LINE 248.
 */

describe('Villa Peruana', function () {

    describe('#tick', function () {

        context('productos normales', function () {

            it('actualiza productos normales antes de la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('normal')->setQuality(10)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(9);
                expect($item->getSellIn())->toBe(4);
            });

            it('actualiza productos normales en la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('normal')->setQuality(10)->setSellIn(0)->build();

                $item->tick();

                expect($item->getQuality())->toBe(8);
                expect($item->getSellIn())->toBe(-1);
            });

            it('actualiza productos normales después de la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('normal')->setQuality(10)->setSellIn(-5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(8);
                expect($item->getSellIn())->toBe(-6);
            });

            it('actualiza productos normales con calidad 0', function () {
                $item = (new ProductBuilder())->setName('normal')->setQuality(0)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(0);
                expect($item->getSellIn())->toBe(4);
            });

        });


        context('Pisco Peruano', function () {

            it('actualiza Pisco Peruano antes de la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(10)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(11);
                expect($item->getSellIn())->toBe(4);
            });

            it('actualiza Pisco Peruano antes de la fecha de venta con máxima calidad', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(50)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(4);
            });

            it('actualiza Pisco Peruano en la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(10)->setSellIn(0)->build();

                $item->tick();

                expect($item->getQuality())->toBe(12);
                expect($item->getSellIn())->toBe(-1);
            });

            it('actualiza Pisco Peruano en la fecha de venta, cerca a su máxima calidad', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(49)->setSellIn(0)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(-1);
            });

            it('actualiza Pisco Peruano en la fecha de venta con máxima calidad', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(50)->setSellIn(0)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(-1);
            });

            it('actualiza Pisco Peruano después de la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(10)->setSellIn(-10)->build();

                $item->tick();

                expect($item->getQuality())->toBe(12);
                expect($item->getSellIn())->toBe(-11);
            });

            it('actualiza Briem items después de la fecha de venta con máxima calidad', function () {
                $item = (new ProductBuilder())->setName('Pisco Peruano')->setQuality(50)->setSellIn(-10)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(-11);
            });

        });


        context('Tumi', function () {

            it('actualiza elementos Tumi antes de la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('Tumi de Oro Moche')->setQuality(10)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(10);
                expect($item->getSellIn())->toBe(5);
            });

            it('actualiza elementos Tumi en la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('Tumi de Oro Moche')->setQuality(10)->setSellIn(0)->build();

                $item->tick();

                expect($item->getQuality())->toBe(10);
                expect($item->getSellIn())->toBe(0);
            });

            it('actualiza elementos Tumi después de la fecha de venta', function () {
                $item = (new ProductBuilder())->setName('Tumi de Oro Moche')->setQuality(10)->setSellIn(-1)->build();

                $item->tick();

                expect($item->getQuality())->toBe(10);
                expect($item->getSellIn())->toBe(-1);
            });

        });


        context('Tickets VIP', function () {
            /*
                "Backstage passes", like Pisco Peruano, increases in Quality as it's SellIn
                value approaches; Quality increases by 2 when there are 10 days or
                less and by 3 when there are 5 days or less but Quality drops to
                0 after the concert
             */
            it('actualiza tickets VIP antes de la fecha del evento', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(10)->setSellIn(11)->build();

                $item->tick();

                expect($item->getQuality())->toBe(11);
                expect($item->getSellIn())->toBe(10);
            });

            it('actualiza tickets VIP cerca a la fecha del evento', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(10)->setSellIn(10)->build();

                $item->tick();

                expect($item->getQuality())->toBe(12);
                expect($item->getSellIn())->toBe(9);
            });

            it('actualiza tickets VIP cerca a la fecha del evento, a la mayor calidad', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(50)->setSellIn(10)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(9);
            });

            it('actualiza tickets VIP muy cerca a la fecha del evento', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(10)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(13); // goes up by 3
                expect($item->getSellIn())->toBe(4);
            });

            it('actualiza tickets VIP muy cerca a la fecha del evento, a máxima calidad', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(50)->setSellIn(5)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(4);
            });

            it('actualiza tickets VIP un día antes de la fecha del evento', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(10)->setSellIn(1)->build();

                $item->tick();

                expect($item->getQuality())->toBe(13);
                expect($item->getSellIn())->toBe(0);
            });

            it('actualiza tickets VIP un día antes de la fecha del evento, a calidad máxima', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(50)->setSellIn(1)->build();

                $item->tick();

                expect($item->getQuality())->toBe(50);
                expect($item->getSellIn())->toBe(0);
            });

            it('actualiza tickets VIP en la fecha del evento', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(10)->setSellIn(0)->build();

                $item->tick();

                expect($item->getQuality())->toBe(0);
                expect($item->getSellIn())->toBe(-1);
            });

            it('actualiza tickets VIP después de la fecha del evento', function () {
                $item = (new ProductBuilder())->setName('Ticket VIP al concierto de Pick Floid')->setQuality(10)->setSellIn(-1)->build();

                $item->tick();

                expect($item->getQuality())->toBe(0);
                expect($item->getSellIn())->toBe(-2);
            });

        });


        // context ("Producto de Café", function () {

        //     it ('actualiza Producto de Café antes de la fecha de venta', function () {
        //         $item = GildedRose::of('Café Altocusco', 10, 10);

        //         $item->tick();

        //         expect($item->getQuality())->toBe(8);
        //         expect($item->getSellIn())->toBe(9);
        //     });

        //     it ('actualiza Producto de Café con cualidad 0', function () {
        //         $item = GildedRose::of('Café Altocusco', 0, 10);

        //         $item->tick();

        //         expect($item->getQuality())->toBe(0);
        //         expect($item->getSellIn())->toBe(9);
        //     });

        //     it ('actualiza Producto de Café en la fecha de venta', function () {
        //         $item = GildedRose::of('Café Altocusco', 10, 0);

        //         $item->tick();

        //         expect($item->getQuality())->toBe(6);
        //         expect($item->getSellIn())->toBe(-1);
        //     });

        //     it ('actualiza Producto de Café en la fecha de venta con calidad 0', function () {
        //         $item = GildedRose::of('Café Altocusco', 0, 0);

        //         $item->tick();

        //         expect($item->getQuality())->toBe(0);
        //         expect($item->getSellIn())->toBe(-1);
        //     });

        //     it ('actualiza Producto de Café después de la fecha de venta', function () {
        //         $item = GildedRose::of('Café Altocusco', 10, -10);

        //         $item->tick();

        //         expect($item->getQuality())->toBe(6);
        //         expect($item->getSellIn())->toBe(-11);
        //     });

        //     it ('actualiza Producto de Café después de la fecha de venta con calidad 0', function () {
        //         $item = GildedRose::of('Café Altocusco', 0, -10);

        //         $item->tick();

        //         expect($item->getQuality())->toBe(0);
        //         expect($item->getSellIn())->toBe(-11);
        //     });

        // });

    });

});

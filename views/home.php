<div class="container view">

    <section id="welcome">

        <div class="row">

            <div class="col-xs-12">

                <h1 class="text-center">Welcome To KirkZay</h1>

            </div>

        </div>

    </section>

    <section id="features">

        <div class="row">

            <h3 class="section-title">Featured Items</h3>
            <!-- Placeholder for featured items.-->
        </div>
        <hr>
        <div class="row">
            <?php foreach ($listing->attributes as $listing): ?>

                <div class="col-xs-4">
                    <a href="/ads/show/?id=<?= $listing['id'] ?>"><img class="img-thumbnail img-responsive featured-image" alt="<?= $listing['item_name']; ?>" src="<?= $listing['item_image']; ?>"></a>
                    <br>
                    <h4><?= $listing['item_name']; ?></h4>
                    <strong>$<?= $listing['item_price']; ?></strong>
                </div>
            <?php endforeach ?>
            <hr>
        </div>

    </section>

</div>

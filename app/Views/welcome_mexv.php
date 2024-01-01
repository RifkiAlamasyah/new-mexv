<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

	<div class="container mt-5">
	<h1 class="text-center fw-bold">Megumi Exclusive</h1>
    <div class="d-flex justify-content-center mt-5">
        <!-- Left Card -->
        <div class="card me-4 mt-3" style="width: 18rem; height :30rem;">
		<div class="card-img-container">
        		<img src="<?= base_url('img-product/mexv_aoda_green_1.png'); ?>" class="card-img-top" alt="Placeholder Image">
    	</div>
            <div class="card-body text-center">
                <h5 class="card-title">Card 1</h5>
                <p class="card-text">Some text for Card 1.</p>
            </div>
        </div>

        <!-- Middle Card (larger) -->
        <div class="card mx-2" style="width: 20rem;">
		<div class="card-img-container">
        		<img src="<?= base_url('img-product/mexv_bluedragon_black_s2.jpg'); ?>" class="card-img-top" alt="Placeholder Image">
    	</div>
            <div class="card-body text-center">
                <h5 class="card-title">Card 2 (Larger)</h5>
                <p class="card-text">Some text for Card 2.</p>
            </div>
        </div>

        <!-- Right Card -->
        <div class="card ms-4 mt-3" style="width: 18rem; height : 30rem;">
		<div class="card-img-container">
        		<img src="<?= base_url('img-product/mexv_crew_silver_s1.jpeg'); ?>" class="card-img-top" alt="Placeholder Image">
    	</div>
            <div class="card-body text-center">
                <h5 class="card-title">Card 3</h5>
                <p class="card-text">Some text for Card 3.</p>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
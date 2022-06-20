    <!-- Modal/popup:post banner -->
    <div class="modal fade" id="postBanner" tabindex="-1" aria-labelledby="postBannerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postBannerModalLabel">Post Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name*" required>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="business_owner" name="business_owner" placeholder="Owner Name*" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="" class="col-form-label">Username : </label>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_instagram" name="url_instagram" placeholder="Instagram">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_facebook" name="url_facebook" placeholder="Facebook">
                            </div>
                            <div class="col-lg-6 mb-2">
                                <input type="text" class="form-control" id="website_link" name="website_link" placeholder="Website Link" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-dark" disabled>Store | Link</button>
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_bukalapak" name="url_bukalapak" placeholder="Bukalapak">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_shopee" name="url_shopee" placeholder="Shoppe">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <input type="text" class="form-control" id="url_tokopedia" name="url_tokopedia" placeholder="Tokopedia">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3 mb-2">
                                <button type="button" class="btn btn-sm btn-outline-dark" disabled>Banner Img*</button>
                            </div>
                            <div class="col-lg-9 mb-2">
                                <input class="form-control form-control-sm" id="img_banner" name="img_banner" type="file" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="saveData" name="saveData" class="btn bg-custom rounded-pill tebel-sedang shadow">Post Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<script src="../assets/js/script.js"></script>
<script src="../assets/js/onscroll.js"></script>
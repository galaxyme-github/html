<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-5">
                        <div class="card-header bft-card-header pt-3">
                        <h5><span class="text-info"><?=$foodtruck_data->name;?></span> Page Builder</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('foodtruck/update_page_styles'); ?>" method="post"  data-toggle="validator" role="form">
                            <?php echo $this->app_lib->generateCSRF(); ?>
                            <input type="hidden" name="foodtruck_id" value="<?php echo sanitize($foodtruck_data->id); ?>">
                            <div class="form-group">
                                <label for="summary">Summary</label>
                                <textarea name="summary" class="summernote-custom-styles" id="summary" placeholder="Please enter summary text for this food truck"><?php echo $foodtruck_data->summary; ?></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label class="control-label mb-10 text-left">Page Background Color</label>
                                <div id="cp1" class="colorpicker input-group colorpicker-component">
                                    <input type="text" value="<?php echo $page_styles->page_bg_color; ?>" name="page_bg_color" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="control-label mb-10 text-left">Food Truck Name Color</label>
                                <div id="cp2" class="colorpicker input-group colorpicker-component">
                                    <input type="text" value="<?php echo $page_styles->ft_name_color; ?>" name="ft_name_color" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="control-label mb-10 text-left">Menu Category Name Color</label>
                                <div id="cp3" class="colorpicker input-group colorpicker-component">
                                    <input type="text" value="<?php echo $page_styles->menu_category_name_color; ?>" name="menu_category_name_color" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="control-label mb-10 text-left">Dish Name Color</label>
                                <div id="cp4" class="colorpicker input-group colorpicker-component">
                                    <input type="text" value="<?php echo $page_styles->dish_name_color; ?>" name="dish_name_color" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="control-label mb-10 text-left">Food Truck Summary Text Color</label>
                                <div id="cp5" class="colorpicker input-group colorpicker-component">
                                    <input type="text" value="<?php echo $page_styles->ft_text_color; ?>" name="ft_text_color" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="control-label mb-10 text-left">Dish Summary Text Color</label>
                                <div id="cp6" class="colorpicker input-group colorpicker-component">
                                    <input type="text" value="<?php echo $page_styles->dish_text_color; ?>" name="dish_text_color" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="row mt-2 pt-3 pl-1 themes-panel">
                                <div class="col-lg-12">
                                    <h5>Background Themes</h5>
                                    <p class="text-muted">When you choose one of the themes, background color won't apply.</p>
                                    <div class="theme-wrap">
                                        <label for="no-theme" class="theme"><img src="<?php echo base_url('uploads/frontend/images/patterns/thumbnails/no-theme.png');?>"/></label>
                                        <input type="radio" name="theme" id="no-theme" value='' />
                                    </div>
                                    <?php for ($i = 1; $i <= 23; $i++): ?>
                                    <div class="theme-wrap">
                                        <label for="theme_<?php echo $i;?>" class="theme <?php if($page_styles->bg_theme == ('theme_' . $i)): ?>active<?php endif; ?>"><img src="<?php echo base_url('uploads/frontend/images/patterns/thumbnails/theme_' . $i . '.png');?>"/></label>
                                        <input type="radio" name="theme" id="theme_<?php echo $i; ?>" value="theme_<?php echo $i; ?>" <?php if ($page_styles->bg_theme == 'theme_' . $i): ?> checked <?php endif; ?> />
                                    </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <button class="btn ft-hero-btn">Save Settings</button>
                                    <a href="<?php echo site_url('foodtruck/reset_page_styles/' . $foodtruck_data->id); ?>"><button type="button" class="btn btn-info">Reset Settings</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5">
                <iframe src="<?php echo site_url('foodtruck/page-builder/preview/' . $foodtruck_data->id);?>" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</section>
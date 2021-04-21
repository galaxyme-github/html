<div class="lp-hero__header lp-hero__bg-image">
        <div class="container lp-area-foodtrucks__search-box">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="lp-hero__header__title">
                        <h2 class="text-center">Search Food Trucks for Catering in <?=$area['state_full_name'];?></h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <form id="search_frm" action="<?php echo site_url('site/foodtrucks/filter'); ?>" class="form-wrap ft-search-frm mt-2 pr-2 pl-2" method="GET">
                        <div class="row ft__fieldset">
                            <div class="p-0">
                                <input name="address" id="address" class="form-control ft-search-box left-border-radius" placeholder="Zip code or City" type="search"/>
                            </div>
                            <div class="p-0">
                                <input name="event_date" id="event_date" class="form-control ft-search-box datepicker border-left-none" placeholder="Date of event" type="text" readonly="readonly" />
                            </div>
                            <div class="p-0">
                                <div class="ft-sb-select form-control ft-search-box border-left-none bg-meal-icon">
                                    <select name="event_time" id="event_time">
                                        <option value="">Meal time</option>
                                        <option vlaue="breakfast">Breakfast</option>
                                        <option vlaue="brunch">Brunch</option>
                                        <option vlaue="lunch">Lunch</option>
                                        <option vlaue="dinner">Dinner</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p-0">
                                <div class="ft-sb-select form-control ft-search-box border-left-none bg-user-icon">
                                    <select name="number_people" id="number_people">
                                        <option value="">How many people?</option>
                                        <option value="40-60">40-60</option>
                                        <option value="60-100">60-100</option>
                                        <option value="100-200">100-200</option>
                                        <option value="200-300">200-300</option>
                                        <option value="300+">300+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p-0">
                                <button type="submit" class="form-control ft-sb-btn ft-search-box border-left-none border-right-radius" id="home-search-btn"><span class="icon-magnifier search-icon"></span>Search<i class="pe-7s-angle-right"></i></button>
                            </div>
                        </div>
                        <input type="hidden" name="search_input_zipcode" id="search_input_zipcode" />
                        <input type="hidden" name="search_latitude" id="search_latitude" />
                        <input type="hidden" name="search_longitude" id="search_longitude" />
                        <input type="hidden" name="search_input_city_name" id="search_input_city_name" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

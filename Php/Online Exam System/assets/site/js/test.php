<?php
$i = 1;
if ($featured != NULL) {
    foreach ($featured as $upcom):
        ?>
        <!-- toggle trigger  -->
        <div class="toggle-trigger2">
            <?php echo $i . '-  ' . $upcom['ap_name']; ?><span>show / hide</span>
        </div>
        <!-- ends toggle trigger  -->
        <div class="toggle-container2">
            <div id="<?php echo 'tab-container_fp' . $i; ?>" class="tab-elements">
                <ul class="etabs">
                    <li class="tab"><a href="<?php echo '#tabs' . $i . '-' . '1'; ?>">Overview</a>
                    </li>
                    <li class="tab"><a href="<?php echo '#tabs' . $i . '-' . '2'; ?>">Location map</a>
                    </li>
                    <li class="tab"><a href="<?php echo '#tabs' . $i . '-' . '3'; ?>">Brochure </a>
                    </li>
                    <li class="tab"><a href="<?php echo '#tabs' . $i . '-' . '4'; ?>">Featured Images </a>
                    </li>
                </ul>
                <div id="<?php echo 'tabs' . $i . '-' . '1'; ?>">
                    <a name="<?php echo $upcom['ap_name']; ?>"></a>
                    <img src="<?php echo base_url() . $upcom['ap_profile_img']; ?>" alt="<?php echo $upcom['ap_name']; ?>" style="max-width: 270px;" />
                    <div id="tab_info">
                        <ul>
                            <li>
                                <span>Address:</span> 
                                <?php
                                if ($upcom['ap_address'] != "") {
                                    echo $upcom['ap_address'];
                                } else {
                                    echo 'not available';
                                }
                                ?>
                            </li>

                            <li>
                                <span>Location:</span> 
                                <?php
                                if ($upcom['ap_city'] != "") {
                                    echo $upcom['ap_city'];
                                } else {
                                    echo 'not available';
                                }
                                ?>
                            </li>
                            <li>
                                <span>Land Area:</span>                                         
                                <?php
                                if ($upcom['ap_area'] != "") {
                                    echo $upcom['ap_area'];
                                } else {
                                    echo 'not available';
                                }
                                ?>
                            </li>
                            <li>
                                <span>No. of Storied:</span> 
                                <?php
                                if ($upcom['ap_no_storied'] != "") {
                                    echo $upcom['ap_no_storied'];
                                } else {
                                    echo 'not available';
                                }
                                ?>                                        
                            </li>
                            <li>
                                <span>Apartment Size:</span>                                     
                                <?php
                                if ($upcom['ap_size'] != "") {
                                    echo $upcom['ap_size'];
                                } else {
                                    echo 'not available';
                                }
                                ?> 
                            </li>
                            <li>
                                <span>Type:</span> 
                                <?php
                                if ($upcom['ap_type'] == '1') {
                                    echo 'Residential Project';
                                } else if ($upcom['ap_type'] == '1') {
                                    echo 'Commercial Project';
                                } else {
                                    echo 'Multi-purpose Complex';
                                }
                                ?>
                            </li>
                            <li>
                                <span>Features-</span> <?php echo strip_tags($upcom['ap_details']); ?>
                            </li>
                        </ul>
                    </div>
                    <!-- content -->
                </div>
                <!-- tabs1 -->
                <div id="<?php echo 'tabs' . $i . '-' . '2'; ?>">
                    <div id="map-holder">
                        <?php
                        if ($upcom['ap_location_map'] != "") {
                            echo $upcom['ap_location_map'];
                        } else {
                            echo 'We are sorry for the short inconvenience.';
                        }
                        ?> 
                        <br />
                        <small><?php echo $upcom['ap_name']; ?></small>
                    </div>
                    <!-- content -->
                </div>
                <!-- tabs2 -->
                <div id="<?php echo 'tabs' . $i . '-' . '3'; ?>">
                    <?php if ($upcom['ap_brochure'] != "") { ?>
                        <a href="<?php echo base_url() . $upcom['ap_brochure']; ?>">Download Here</a>

                        <?php
                    } else {
                        echo '<p>We are sorry for the short inconvenience. The online version brochure for this project is not available at this moment.</p>';
                    }
                    ?> 

                </div>
                <!-- tabs3 -->
                <div id="<?php echo 'tabs' . $i . '-' . '4'; ?>">
                    <ul id="toggle_bigimg_container">
                        <li>
                            <a href="images/project_apartment/completed/pori_big1.jpg" class="fancybox" rel="gallery1">
                                <img src="images/project_apartment/completed/pori_small1.jpg">
                            </a>
                        </li>
                    </ul>
                    <!-- toggle_bigimg_container -->
                </div>
                <!-- tabs-4 -->
            </div>
            <!-- //Tab Container -->
        </div>        
        <!-- ends toggle container -->
        <?php
        $i++;
    endforeach;
}
?>
</div>
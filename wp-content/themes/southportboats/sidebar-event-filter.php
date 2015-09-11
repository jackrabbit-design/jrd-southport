<div id="event-filter" class="filter-bar">
    <div class="container">
        <div class="container-inner">
            <div class="filter">
                <form>
                    <ul>
                        <li>
                            <label>TYPE</label>
                            <div class="select-wrap">
                                <select>
                                    <option value="<?php echo get_the_permalink('250'); ?>">Show All</option>
                                    <?php $cats = get_terms('event-type'); ?>
                                    <?php foreach($cats as $c):
                                        echo '<option value="' . get_bloginfo('url') . '/event-type/' . $c->slug.'" ' . (is_tax('event-type', $c->slug) ? 'selected' : '') . '>'.$c->name.'</option>';
                                    endforeach; ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>REGION</label>
                            <div class="select-wrap">
                                <select>
                                    <option value="<?php echo get_the_permalink('250'); ?>">Show All</option>
                                    <?php $cats = get_terms('region'); ?>
                                    <?php foreach($cats as $c):
                                        echo '<option value="' . get_bloginfo('url')  . '/region/' . $c->slug.'" ' . (is_tax('region', $c->slug) ? 'selected' : '') . '>'.$c->name.'</option>';
                                    endforeach; ?>
                                </select>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>

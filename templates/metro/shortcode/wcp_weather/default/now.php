<?php
    namespace Webcodin\WCPOpenWeather\Theme\MetroTheme;
    
    $data = $params;
    $item = $data->getFirst();
    $windDeg = $item->getWindDeg();
?>
<table class="wcp-openweather-content-tbl wcp-openweather-primary-color" cellspacing="0" cellpadding="0"> 
    <tr>
        <td class="wcp-openweather-now-details">
            <div class="wcp-openweather-now-details-row">
                <div class="wcp-openweather-now-details-row-content">
                    <span class="wcp-openweather-now-details-title wcp-openweather-primary-color"><?php _e('Wind', 'wcp-openweather-theme'); ?></span>            
                    <span class="wcp-openweather-now-details-value wcp-openweather-primary-color"><?php echo $item->getWindSpeed();?><?php echo !empty($windDeg) ? ', '.$windDeg : '';?></span>
                </div>
            </div>
            <div class="wcp-openweather-now-details-row">
                <div class="wcp-openweather-now-details-row-content">
                    <span class="wcp-openweather-now-details-title wcp-openweather-primary-color"><?php _e('Pressure', 'wcp-openweather-theme'); ?></span>
                    <span class="wcp-openweather-now-details-value wcp-openweather-primary-color"><?php echo $item->getPressure();?></span>
                </div>
            </div>
        </td>        
        <td class="wcp-openweather-now-temperature-wrapper">
            <div class="wcp-openweather-now-icon-wrapper">
                <span class="wcp-openweather-now-value wcp-openweather-primary-color"><?php echo $item->getTemperature();?><sup class="wcp-openweather-now-value-deg">&deg;</sup><?php echo $item->getTempUnitShort();?></span>
                <span class="wcp-openweather-now-icon wcp-openweather-primary-color">
                    <?php echo Theme::instance()->renderIcon( $item, $data->hideWeatherConditions ); ?>
                </span>
            </div>            
            <?php if (empty($data->hideWeatherConditions)): ?><span class="wcp-openweather-now-status wcp-openweather-primary-color"><?php echo $item->getWeatherDescription();?></span><?php endif;?>       
        </td>        
        <td class="wcp-openweather-now-details">               
            <div class="wcp-openweather-now-details-row">
                <div class="wcp-openweather-now-details-row-content">
                    <span class="wcp-openweather-now-details-title wcp-openweather-primary-color"><?php _e('Humidity', 'wcp-openweather-theme'); ?></span>
                    <span class="wcp-openweather-now-details-value wcp-openweather-primary-color"><?php echo $item->getHumidity();?></span>
                </div>
            </div>
            <div class="wcp-openweather-now-details-row">
                <div class="wcp-openweather-now-details-row-content">
                    <span class="wcp-openweather-now-details-title wcp-openweather-primary-color"><?php _e('Clouds', 'wcp-openweather-theme'); ?></span>
                    <span class="wcp-openweather-now-details-value wcp-openweather-primary-color"><?php echo $item->getClouds();?></span>
                </div>
            </div>
        </td>
    </tr>
</table>
        


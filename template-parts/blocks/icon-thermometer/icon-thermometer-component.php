<?php
class IconThermometerProps {
    public  $icon;
    public  $raised;
    public  $goal;
    public  $description;

    public function __construct($props = array())
    {
        foreach ($props as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

function IconThermometer($props = array()) {
    if (!$props instanceof IconThermometerProps) {
        $props = new IconThermometerProps($props);
    }
?>
<div class="d-flex align-items-center justify-content-center" style="column-gap:1rem;">
    <img src="<?= $props->icon; ?>" alt="" width="64">
    <h2 class="has-xl-font-size has-white-color has-metropolis-font-family" style="font-weight:bold;margin-bottom:0;">
        <?= number_format($props->raised); ?> of <?= number_format($props->goal); ?> <?= $props->description; ?>
    </h2>
</div>
<?php
}

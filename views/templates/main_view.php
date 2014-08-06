<?php
$this->setTitle("VIEW PAGE!");
$this->addCSS("test.css");
$this->addJS("test.js");
?>
<!DOCTYPE HTML>
<html>
<head>
    <!-- Document Title Dynamically loaded -->
    <?php echo "<title>{$this->getTitle()}</title>" ?>

    <!-- Document CSS Files Dynamically loaded -->
    <?php foreach($this->getCSS() as $file) echo "<link href='$file' rel='stylesheet' type='text/css'>"; ?>

    <!-- Document JS Files Dynamically loaded -->
    <?php foreach($this->getJS() as $file) echo "<script src='$file' type='text/javascript'></script>"; ?>
</head>
<body>
    <div>
        <?php
            print_r($this->data);
        ?>
    </div>
</body>
</html>
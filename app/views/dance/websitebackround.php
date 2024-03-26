
<?php
$numberOfLines = 25; // Increase for more lines

echo '<div class="lines-container">';
for ($i = 0; $i < $numberOfLines; $i++) {
    // Random rotation angle
    $rotation = rand(-45, 45); // Angle range -45 to 45 degrees

    // Random position for the line's starting point
    $top = rand(0, 100); // Random start position from top of the page
    $left = rand(0, 100); // Random start position from left of the page
    // Adjust the length and thickness of the lines if desired
    $length = rand(60, 100); // Random length as a percentage of viewport height
    $thickness = rand(2, 6); // Random thickness for the lines

    echo "<div class='line' style='
            transform: rotate({$rotation}deg);
            top: {$top}vh;
            left: {$left}%;
            width: {$thickness}px;
            height: {$length}vh;
        '></div>";
}
echo '</div>';
?>

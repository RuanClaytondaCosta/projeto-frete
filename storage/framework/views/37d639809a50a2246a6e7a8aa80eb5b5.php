<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Frete</title>
</head>
<body>
    <h1>Resultado do Frete</h1>
    <p>Cliente: <?php echo e($frete->cliente); ?></p>
    <p>Peso: <?php echo e($frete->peso); ?> kg</p>
    <p>Distância: <?php echo e($frete->distancia); ?> km</p>
    <p>Tipo: <?php echo e($frete->tipo); ?></p>
    <p>Valor calculado: R$ <?php echo e(number_format($frete->valor, 2, ',', '.')); ?></p>
</body>
</html>
<?php /**PATH C:\Users\RUAN\Documents\projetos HTML\laravel projeto2\laravel projeto\frete-app\resources\views/frete/resultado.blade.php ENDPATH**/ ?>
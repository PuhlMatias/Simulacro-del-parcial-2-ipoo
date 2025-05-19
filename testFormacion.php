<?php
include_once 'claseLocomotora.php';
include_once 'claseFormacion.php';
include_once 'claseVagonPasajeros.php';
include_once 'claseVagonCarga.php';
include_once 'claseVagon.php';

echo "====== CREACIÓN DE OBJETOS ======\n";

// 1. Crear objeto locomotora (peso en kg, 188 toneladas = 188000 kg)
$objLocomotora = new Locomotora(188000, 140);

// 2. Crear 3 objetos vagones
$objVagon1 = new VagonPasajeros(30, 25, 2015, 20, 5, 15000); // capacidad 30, 25 actuales
$objVagon2 = new VagonCarga(2010, 25, 5, 15000, 55000, 0); // carga máxima 55000, sin carga actual
$objVagon3 = new VagonPasajeros(50, 50, 2018, 22, 5, 15000); // lleno

// 3. Crear formación
$objFormacion = new Formacion($objLocomotora, 5);

// Incorporar vagones
$objFormacion->incorporarVagonFormacion($objVagon1);
$objFormacion->incorporarVagonFormacion($objVagon2);
$objFormacion->incorporarVagonFormacion($objVagon3);

// 4. Intentar incorporar 6 pasajeros
$resultado1 = $objFormacion->incorporarPasajeroFormacion(6);
echo "Resultado incorporar 6 pasajeros: " . ($resultado1 ? "✅ OK\n" : "❌ No se pudo\n");

// 5. Print de los vagones
echo "\n--- Estado de los vagones ---\n";
echo $objVagon1->__toString();
echo $objVagon2->__toString();
echo $objVagon3->__toString();

// 6. Intentar incorporar 14 pasajeros
$resultado2 = $objFormacion->incorporarPasajeroFormacion(14);
echo "\nResultado incorporar 14 pasajeros: " . ($resultado2 ? "✅ OK\n" : "❌ No se pudo\n");

// 7. Print locomotora
echo "\n--- Locomotora ---\n";
echo "Peso: " . $objLocomotora->getPeso() . " kg\n";
echo "Velocidad máxima: " . $objLocomotora->getVelocidadMaxima() . " km/h\n";

// 8. Promedio de pasajeros por vagón
$promedio = $objFormacion->promedioPasajerosFormacion();
echo "\nPromedio de pasajeros por vagón: " . $promedio . "\n";

// 9. Peso total de la formación
$pesoTotal = $objFormacion->pesoFormacion();
echo "\nPeso total de la formación: " . $pesoTotal . " kg\n";

// 10. Print final de los vagones
echo "\n--- Estado final de los vagones ---\n";
echo $objVagon1->__toString();
echo $objVagon2->__toString();
echo $objVagon3->__toString();

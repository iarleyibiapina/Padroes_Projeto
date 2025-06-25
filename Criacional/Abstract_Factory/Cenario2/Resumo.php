<?php

// ============== 1. INTERFACES DOS PRODUTOS ==============
interface MotorInterface {}
interface PneuInterface {}
interface GasolinaInterface {}

// ============== 2. PRODUTOS CONCRETOS (FAMÍLIA FORD) ==============
class MotorFord implements MotorInterface { public string $tipo = "Motor Ford V8"; }
class PneuFord implements PneuInterface { public string $tipo = "Pneu Ford Aro 18"; }
class GasolinaFord implements GasolinaInterface { public string $tipo = "Gasolina Aditivada Ford"; }

// ============== 3. PRODUTOS CONCRETOS (FAMÍLIA VOLKSWAGEN) ==============
class MotorVW implements MotorInterface { public string $tipo = "Motor VW 1.6 TSI"; }
class PneuVW implements PneuInterface { public string $tipo = "Pneu VW Aro 17"; }
class GasolinaVW implements GasolinaInterface { public string $tipo = "Gasolina Comum VW"; }


// ============== 4. FÁBRICA ABSTRATA ==============
abstract class VeiculoAbstratoFactory
{
    abstract public function criarMotor(): MotorInterface;
    abstract public function criarPneu(): PneuInterface;
    abstract public function criarGasolina(): GasolinaInterface;

    /**
     * Um método de conveniência que usa os factory methods
     * para criar um conjunto completo de produtos.
     */
    public function montarConjuntoCompleto(): array
    {
        return [
            'motor' => $this->criarMotor(),
            'pneu' => $this->criarPneu(),
            'gasolina' => $this->criarGasolina()
        ];
    }
}

// ============== 5. FÁBRICAS CONCRETAS ==============
class FordFactory extends VeiculoAbstratoFactory
{
    public function criarMotor(): MotorInterface { return new MotorFord(); }
    public function criarPneu(): PneuInterface { return new PneuFord(); }
    public function criarGasolina(): GasolinaInterface { return new GasolinaFord(); }
}

class VWFactory extends VeiculoAbstratoFactory
{
    public function criarMotor(): MotorInterface { return new MotorVW(); }
    public function criarPneu(): PneuInterface { return new PneuVW(); }
    public function criarGasolina(): GasolinaInterface { return new GasolinaVW(); }
}


// ============== 6. O CLIENTE ==============
class Montador
{
    public function montarVeiculoCustomizado(VeiculoAbstratoFactory $fabrica): array
    {
        // O cliente tem controle total para pegar apenas o que precisa
        echo "Montagem customizada iniciada...\n";
        $motor = $fabrica->criarMotor();
        $pneu  = $fabrica->criarPneu();
        return ['motor_custom' => $motor, 'pneu_custom' => $pneu];
    }
}


// ============== 7. EXECUÇÃO ==============
$montador = new Montador();

// --- Usando a FordFactory ---
echo "--- Trabalhando com a Fábrica da Ford ---\n";
$fabricaFord = new FordFactory();

// Usando o método de conveniência da fábrica
$conjuntoFord = $fabricaFord->montarConjuntoCompleto();
print_r($conjuntoFord);

// Usando o montador customizado
$montagemCustomFord = $montador->montarVeiculoCustomizado($fabricaFord);
print_r($montagemCustomFord);


// --- Usando a VWFactory para mostrar a flexibilidade ---
echo "\n--- Trocando para a Fábrica da Volkswagen ---\n";
$fabricaVW = new VWFactory();

// O mesmo método de conveniência funciona para a outra família
$conjuntoVW = $fabricaVW->montarConjuntoCompleto();
print_r($conjuntoVW);

// O mesmo montador funciona perfeitamente com a outra fábrica
$montagemCustomVW = $montador->montarVeiculoCustomizado($fabricaVW);
print_r($montagemCustomVW);
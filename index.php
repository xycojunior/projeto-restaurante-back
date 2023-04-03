<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
</head>

<body>
    <?php
        class Pedido {
            private $itens;
            private $mesa;
            private $total; 

            public function __construct($mesa) {
            $this->itens = array();
            $this->mesa = $mesa;
            $this->total = 0;
            }

            public function adicionarItem($item) {
            $this->itens[] = $item;
            $this->total += $item->getPreco() * $item->getQuantidade();
            }

            public function getMesa() {
            return $this->mesa;
            }

            public function getTotal() {
            return $this->total;
            }
        }

        class ItemPedido {
            private $nome;
            private $quantidade;
            private $preco;

            public function __construct($nome, $quantidade, $preco) {
            $this->nome = $nome;
            $this->quantidade = $quantidade;
            $this->preco = $preco;
            }

            public function getNome() {
            return $this->nome;
            }

            public function getQuantidade() {
            return $this->quantidade;
            }

            public function getPreco() {
            return $this->preco;
            }
        }

        class Mesa {
            private $numero;
            private $ocupada;

            public function __construct($numero) {
            $this->numero = $numero;
            $this->ocupada = false;
            }

            public function ocupar() {
            $this->ocupada = true;
            }

            public function desocupar() {
            $this->ocupada = false;
            }

            public function estaOcupada() {
            return $this->ocupada;
            }

            public function getNumero() {
            return $this->numero;
            }
        }

        // Exemplo de uso:

        $mesa1 = new Mesa(1);
        $pedido1 = new Pedido($mesa1);

        $item1 = new ItemPedido("Pizza", 2, 25.0);
        $item2 = new ItemPedido("Refrigerante", 3, 5.0);

        $pedido1->adicionarItem($item1);
        $pedido1->adicionarItem($item2);

        echo "Mesa " . $pedido1->getMesa()->getNumero() . ": ";
        foreach ($pedido1->getItens()as$item) {
        echo $item->getQuantidade() . "x " . $item->getNome() . " ";
        }
        echo "- Total: R$ " . $pedido1->getTotal()."\n";
    ?>
</body>

</html>
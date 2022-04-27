<?php

require_once "connection.php";

class CRUD
{

    public static function SELECT_ALL($campos, $tabela, $comando, $extra)
    {
        $sql = "SELECT $campos FROM $tabela $comando $extra";
        $query = CONNECTION::PDO()->prepare($sql);
        $query->execute();
        global $dados_all;
        $dados_all = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function SELECT_OBJ($campos, $tabela, $comando, $extra)
    {
        $sql = "SELECT $campos FROM $tabela $comando $extra";
        $query = CONNECTION::PDO()->prepare($sql);
        $query->execute();
        global $dados_obj;
        $dados_obj = $query->fetch(PDO::FETCH_ASSOC, PDO::FETCH_OBJ);
    }

    public static function INSERT_INTO($tabela, $parametros)
    {
        $colunas = '';
        $values = '';

        foreach ($parametros as $key => $val) {
            $colunas .= ($colunas == '' ? '' : ', ') . $key;
            $values .= ($values == '' ? '' : ',') . '"' . $val . '"';
        }

        $sql = "INSERT INTO $tabela ($colunas) VALUE($values)";
        $query = CONNECTION::PDO()->prepare($sql);
        $query->execute();
    }

    public static function DELETE($tabela, $comando, $extra)
    {
        $sql = "DELETE FROM $tabela $comando $extra";
        $query = CONNECTION::PDO()->prepare($sql);
        $query->execute();
    }

    public static function UPDATE($tabela, $comando, $extra)
    {
        $sql = "UPDATE $tabela SET $comando $extra";
        $query = CONNECTION::PDO()->prepare($sql);
        $query->execute();
    }
}

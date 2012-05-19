<?php

function anti_injection($sql)
{
// remove palavras que contenham sintaxe sql
        $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$sql);
        $sql = trim($sql);//limpa espaços vazio
        $sql = strip_tags($sql);//tira tags html e php
        $sql = addslashes($sql);//Adiciona barras invertidas a uma string
return $sql;
}
?>
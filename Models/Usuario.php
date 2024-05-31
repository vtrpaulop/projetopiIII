<?php

namespace Models;

class Usuario
{

    public function __construct(
        private string $id,
        private string $nome,
        private string $sobreNome,
        private string $rg,
        private string $cpf,
        private string $dataNascimento,
        private string $telefone,
        private string $cartaoSus,
        private string $endereco,
        private string $bairro,
        private string $email,
        private string $senha = "",
        private string $funcao = ""
    ) {

    }

    public function id()
    {
        return $this->id ?? null;
    }

    public function nome()
    {
        return $this->nome ?? null;
    }

    public function sobreNome()
    {
        return $this->sobreNome ?? null;
    }

    public function rg()
    {
        return $this->rg ?? null;
    }

    public function cpf()
    {
        return $this->cpf ?? null;
    }

    public function dataNascimento()
    {
        return $this->dataNascimento ?? null;
    }

    public function telefone()
    {
        return $this->telefone ?? null;
    }

    public function cartaoSUS()
    {
        return $this->cartaoSus ?? null;
    }

    public function endereco()
    {
        return $this->endereco ?? null;
    }

    public function bairro()
    {
        return $this->bairro ?? null;
    }

    public function email()
    {
        return $this->email ?? null;
    }

    public function senha()
    {
        return $this->senha ?? null;
    }

    public function funcao()
    {
        return $this->funcao ?? null;
    }
}
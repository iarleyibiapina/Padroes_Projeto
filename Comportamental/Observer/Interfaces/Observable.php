<?php 

// Tambem conhecido como "publisher"
interface Observable
{
    /**
     * Inscreve um ou mais observador
     * @param Observer[] $observer
     * @return void
     */
    public function subscribe(Observer ...$observer): void;
    /**
     * Retira um observador da lista do observavel
     * @param Observer $observer
     * @return void
     */
    public function unsubscribe(Observer $observer): void;
    // envia a notificacao todos os inscritos
    public function notify(): void;
}
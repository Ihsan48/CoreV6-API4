<?php

namespace TheNote\core\session;


use pocketmine\player\Player;

class SessionManager{

    private $sessions = [];

    public function has(Player $player): bool{
        return isset($this->sessions[$player->getName()]);
    }

    public function get(Player $player): Session{
        $this->add($player);
        return $this->sessions[$player->getName()];
    }

    public function add(Player $player): void{
        if(!$this->has($player)){
            $this->sessions[$player->getName()] = new Session($player);
        }
    }

    public function remove(Player $player): void{
        if($this->has($player)){
            unset($this->sessions[$player->getName()]);
        }
    }
}
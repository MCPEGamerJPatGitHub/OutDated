<?php

namespace /OutDated/scr/OutDated/OutDated.php

use /pocketmine/plugin/PluginBase;

public function onDPRPacket(DataPacketReceiveEvent $ev){
        $p = $ev->getPlayer();
        if(($pk = $ev->getPacket()) instanceof DataPacket){
            switch($pk->pid()){
                case ProtocolInfo::LOGIN_PACKET:
                    if($pk->protocol1 === ProtocolInfo::CURRENT_PROTOCOL){
                        return;
                    }
                    if($pk->protocol1 > ProtocolInfo::CURRENT_PROTOCOL){
                        $p->kick("Why are you new with the cool kids? Downgrade your Client!");
                        $ev->setCancelled(true);
                    }else{
                        $p->kick("Dumbo! Update your client. Your old :(");
                        $ev->setCancelled(true);
                    }
                break;
             
                default:
             
                break;
            }
        }
    }

?>

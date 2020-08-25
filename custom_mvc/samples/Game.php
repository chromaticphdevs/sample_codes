<?php   
    

    class Game
    {

        public function __construct($gameDetails) 
        {
            $this->gameDetails = $gameDetails;
            
            $this->picksBans = $gameDetails->picks_bans;


            $this->heroes    = $this->setHeroes();
        }
        public function getPicksBans()
        {
            $picks = '';
            $bans = '';

            $picksBans = $this->picksBans;

            foreach($picksBans as $key => $row) {

                if($row->is_pick) {
                    $picks .= '<li>'.$this->getHero($row->hero_id) . '</li>';
                }else{
                    $bans .= '<li>' . $this->getHero($row->hero_id) . '</li>'; 
                }
            }

            $html = <<< EOF
                <ul> 
                    <li> <strong> Picks </strong> </li>
                    {$picks} 
                    <li> <strong> Bans </strong> </li>
                    {$bans}
                </ul>
            EOF;

            return $html;
        }


        public function getHero($heroid)
        {
            $heroes = $this->heroes;


            foreach($heroes as $key => $row) {

                if($row->id === $heroid) {
                    return $row->localized_name;
                    break;
                }
            }
        }

        public function getWinner()
        {
            $gameDetails = $this->gameDetails;

            if($gameDetails->radiant_win) {
                return 'Radiant Win';
            }else{
                return 'Dire Win';
            }
        }
        private function setHeroes()
        {
            $heroes = CallAPI('GET' , "https://api.opendota.com/api/heroes");


            return json_decode($heroes);
        }
        
    }
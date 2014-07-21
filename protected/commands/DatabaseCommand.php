<?php

class DatabaseCommand extends CConsoleCommand {

    /**
     * 
     * @param string[] $args
     * @var Subscriber[] $subscribers
     */
    public function run($args) {
        $step = 1000;
        $counter = 0;
        for ($counter = 0; $counter <= 500; $counter++) {
            $listTPS = TPS::model()->findAll(array('limit' => $step, 'offset' => $counter * $step));
            foreach ($listTPS as $TPS) {
                $inputs = $TPS->inputs;
                if (count($inputs)) {
                    $map = array();
                    foreach ($inputs as $input) {
                        if (!isset($map[$input->prabowo_count . '-' . $input->jokowi_count . '-' . $input->broken_count])) {
                            $map[$input->prabowo_count . '-' . $input->jokowi_count . '-' . $input->broken_count] = 0;
                        }
                        $map[$input->prabowo_count . '-' . $input->jokowi_count . '-' . $input->broken_count] ++;
                    }
                    asort($map);

                    $values = array_keys($map);

                    $data = $values[0];
                    $info = explode('-', $data);
                    $TPS->prabowo_count = $info[0];
                    $TPS->jokowi_count = $info[1];
                    $TPS->broken_count = $info[2];
                    $TPS->entries_count = count($inputs);
                    $TPS->ratio = $map[$data] / array_sum($map);
                    if (!$TPS->save()) {
                        break;
                    }
                }
            }
            echo "Tahap $counter : Selesai\n";
            unset($listTPS);
        }
        Yii::app()->end();
    }

}

?>

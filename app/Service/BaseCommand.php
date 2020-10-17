<?php

namespace App\Service;

class BaseCommand
{
    public function doCommand($arr, $user)
    {
        return $this->createReturn(1, "unhandled command");
    }
    public function createReturn($error_code, $message = "", $result = null)
    {
        $ret = new \stdClass();
        $ret->error_code = $error_code;
        $ret->message = $message;
        $ret->result = $result;

        return $ret;
    }
    public function execute($arr, $user)
    {
        try {
            \DB::beginTransaction();
            $ret = $this->doCommand($arr, $user);
            \DB::commit();

            return $ret;
        } catch (\Exception $exc) {
            \DB::rollback();
            $str = $exc->getMessage() . " On Line " . $exc->getLine() . " On File " . $exc->getFile();
            return $this->createReturn(2, $str);
        }
    }
}
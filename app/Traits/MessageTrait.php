<?php

namespace App\Traits;

trait MessageTrait
{
    /**
     * Send an informational message.
     *
     * @param  string $message The message content.
     */

     protected function sendInfo(string $message)
     {
         $this->sendMsg('msg', ['msgType' => 'info', 'msg' => $message]);
     }
 
     /**
      * Send an error message.
      *
      * @param  string|array $message The error message content.
      */
 
     protected function sendError($message)
     {
         $this->sendMsg('msg', ['msgType' => 'error', 'msg' => $message]);
     }
 
     /**
      * Send a success message.
      *
      * @param  string $message The success message content.
      */
 
     protected function sendSuccess(string $message)
     {
         $this->sendMsg('msg', ['msgType' => 'success', 'msg' => $message]);
     }
 
     /**
      * @param mixed $key
      * @param array $value
      * @return Livewire\Features\SupportEvents\HandlesEvents::dispatch
      */
 
    protected function sendMsg($key, array $value)
    {
        $this->dispatch($key, $value);
    }
}

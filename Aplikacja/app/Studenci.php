<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studenci extends Model
{
    //
    protected $table = 'studenci';
    
    public function oceny()
    {
        return \App\Lekcje::where('student', $this->id)
            ->where(function ($query) {
                $query->whereNotNull('ocena')
                    ->orWhere(function ($query) {
                        $query->whereNotNull('ocena_poprawkowa');
                    });
            })->get();
    }
    
    public function all_oceny()
    {
        $oceny = [];
        foreach($this->oceny() as $lekcja)
        {
            $oceny[] = $lekcja->ocena_poprawkowa ?? $lekcja->ocena;
        }
        return $oceny;
    }
    
    public function all_przedmioty()
    {
        $przedmioty = [];
        foreach($this->oceny() as $lekcja)
        {
            $przedmioty[] = \App\Przedmiot::where('id', $lekcja->przedmiot)->first()->nazwa;
        }
        return $przedmioty;
    }
    
    public function srednia()
    {
        if($this->oceny()->toArray())
        {
            $x=0;
            $oceny = 0;
            foreach($this->oceny() as $ocena)
            {
                $oceny += $ocena->ocena_poprawkowa ?? $ocena->ocena;
                $x++;
            }
            return $oceny/$x;
        }
        return 'Brak ocen!';
    }
    
    public function niema()
    {
        $przedmioty = \App\Przedmioty::all()->pluck('nazwa','id');
        $moje = \App\Lekcje::where('student', $this->id)->get()->pluck('przedmiot');
        
        $final = [];
        
        foreach($przedmioty as $id => $value)
        {
            foreach($moje as $moj)
            {
                if($moj === $id)
                {
                    //$final[] = $moj.'==='.$id;
                    $final[$id] = $value;
                    unset($przedmioty[$id]);
                }
            }
        }
        
        return $przedmioty;
    }

}
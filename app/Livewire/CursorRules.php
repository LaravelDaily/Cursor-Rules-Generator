<?php

namespace App\Livewire;

use Livewire\Component;

class CursorRules extends Component
{
    public string $phpVersion = '8.3';
    public string $rulesText;

    public function mount()
    {
        $this->phpVersion = config('cursor.default_php_version');
        $this->updateRulesText();
    }

    public function updatedPhpVersion()
    {
        $this->updateRulesText();
    }

    private function updateRulesText()
    {
        $phpVersionText = $this->phpVersion === 'none' ? '' : $this->phpVersion;
        $phpVersionString = $phpVersionText ? "PHP version {$phpVersionText}+" : "PHP";
        
        $this->rulesText = "You are a senior developer working on Laravel project. Please use Laravel 11+ and {$phpVersionString} syntax.";
    }

    public function render()
    {
        $phpVersions = config('cursor.php_versions');
        
        return view('livewire.cursor-rules', [
            'phpVersions' => $phpVersions
        ])->layout('layouts.app');
    }
} 
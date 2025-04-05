<?php

namespace App\Livewire;

use Livewire\Component;

class CursorRules extends Component
{
    public string $phpVersion = '8.3';
    public string $laravelVersion = '11';
    public string $codeStyling = 'PSR-12';
    public string $actionOrService = 'Service';
    public string $testingFramework = 'Pest';
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

    public function updatedLaravelVersion()
    {
        $this->updateRulesText();
    }

    public function updatedCodeStyling()
    {
        $this->updateRulesText();
    }

    public function updatedActionOrService()
    {
        $this->updateRulesText();
    }

    public function updatedTestingFramework()
    {
        $this->updateRulesText();
    }

    private function updateRulesText()
    {
        $template = file_get_contents(resource_path('views/cursorrules-template.blade.php'));
        
        // Replace template variables with their values
        $replacements = [
            '{{ $phpVersion }}' => $this->phpVersion === 'none' ? '' : $this->phpVersion,
            '{{ $laravelVersion }}' => $this->laravelVersion,
            '{{ $codeStyling }}' => $this->codeStyling,
            '{{ $actionOrService }}' => $this->actionOrService,
            '{{ $testingFramework }}' => $this->testingFramework,
        ];
        
        $rulesText = str_replace(array_keys($replacements), array_values($replacements), $template);
        
        // Replace multiple spaces with a single space (while preserving newlines)
        $this->rulesText = preg_replace('/[ ]{2,}/', ' ', $rulesText);

        $this->rulesText = str_replace(' .', '.', $this->rulesText);
    }

    public function render()
    {
        $phpVersions = config('cursor.php_versions');
        
        return view('livewire.cursor-rules', [
            'phpVersions' => $phpVersions
        ])->layout('layouts.app');
    }
} 
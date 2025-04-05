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
            '{{ $phpVersion ?? \'\' }}' => $this->phpVersion,
            '{{ $laravelVersion ?? \'\' }}' => $this->laravelVersion,
            '{{ $codeStyling ?? \'PSR-12\' }}' => $this->codeStyling,
            '{{ $actionOrService ?? \'Service\' }}' => $this->actionOrService,
            '{{ $testingFramework ?? \'Pest\' }}' => $this->testingFramework,
        ];
        
        $this->rulesText = str_replace(array_keys($replacements), array_values($replacements), $template);
    }

    public function render()
    {
        $phpVersions = config('cursor.php_versions');
        
        return view('livewire.cursor-rules', [
            'phpVersions' => $phpVersions
        ])->layout('layouts.app');
    }
} 
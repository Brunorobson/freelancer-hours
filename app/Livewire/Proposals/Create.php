<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public Project $project;
    #[Rule(['required', 'email'])]
    public string $email = '';
    #[Rule(['required', 'numeric', 'gt:0'])]
    public int $hours = 0;
    public bool $modal = false;
    public bool $agree = false;
    public function save()
    {
        $this->validate();

        if (! $this->agree) {
            $this->addError('agree', 'Você precisa concordar com os termos de uso');

            return;
        }

        DB::transaction(function () {
            $proposal = $this->project->proposals()
                ->updateOrCreate(
                    ['email' => $this->email],
                    ['hours' => $this->hours]
                );
            $this->arrangePositions($proposal);
        });

        $this->modal = false;
    }
    public function render()
    {
        return view('livewire.proposals.create');
    }
   
}

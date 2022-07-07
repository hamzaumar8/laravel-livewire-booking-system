<?php

namespace App\Http\Livewire;

use Carbon\CarbonInterval;
use Livewire\Component;

class ShowAllBooking extends Component
{

    public $date;

    public $calendarStartDate;

    public $employee;

    public $service;

    public $time;

    public function mount()
    {
        $this->calendarStartDate = now();
    }


    // the all the slot
    public function getAvailableTimeSlotsProperty()
    {
        if (!$this->employee || !$this->employeeSchedule) {
            return collect();
        }

        return $this->employee->availableTimeSlots($this->employeeSchedule, $this->service);
    }

    public function getCalendarWeekIntervalProperty()
    {
        return CarbonInterval::minute(30)
            ->toPeriod(
                $this->calendarStartDate->setTimeFrom('7:00 am'),
                $this->calendarStartDate->clone()->setTimeFrom('8:00 pm')
            );
    }

    public function getWeekIsGreaterThanCurrentProperty()
    {
        return $this->calendarStartDate->gt(now());
    }

    public function incrementCalendarWeek()
    {
        $this->calendarStartDate->addDay();
    }

    public function decrementCalendarWeek()
    {
        $this->calendarStartDate->subDay();
    }

    public function render()
    {
        return view('livewire.show-all-booking')->layout('layouts.guest');
    }
}
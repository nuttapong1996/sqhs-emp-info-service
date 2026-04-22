<?php

namespace App\Livewire;

use App\Models\EmployeeHoliday;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;


final class HolidayTable extends PowerGridComponent
{
    public string $tableName = 'holidayTable';

    public string $primaryKey = 'code_tblofflist';

    public string $sortField = 'code_tblofflist';

    // ประกาศตัวแปรเก็บค่าปีที่เลือก
    public string $selectedYear;

    public string $title = '';

    public function mount(): void
    {
        // ตั้งค่าเริ่มต้นเป็นปีปัจจุบัน
        $this->selectedYear = date('Y');
        $this->title = 'รายการลาปี';
        parent::mount();
    }

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                // ->showSearchInput(),
                ->includeViewOnTop('year-dropdown'),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $emp = Auth::user();
        return EmployeeHoliday::where('code_emp_offlist', $emp['code_emp'])->where('yearoff_offlist', $this->selectedYear)->orderBy('code_tblofflist', 'desc');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('no_emp_offlist')
            ->add('startday_offlist' , function($holiday){
                return Carbon::parse($holiday->startday_offlist)->format('d-m-Y');
            })
            ->add('endday_offlist' , function($holiday){
                return Carbon::parse($holiday->endday_offlist)->format('d-m-Y');
            })
            ->add('type_off_offlist' ,function($holiday){
                return e(trim(str_replace(['1.','2.','3.','4.','5.','6.','7.'], '', $holiday->type_off_offlist)));
            })
            ->add('countday_offlist')
            ->add('comment_offlist');
    }

    public function columns(): array
    {
        return [
            Column::add()->title('ลาวันที่')->field('startday_offlist'),
            Column::add()->title('ถึงวันที่')->field('endday_offlist'),
            Column::add()->title('เลขที่ใบลา')->field('no_emp_offlist'),
            Column::add()->title('ประเภท')->field('type_off_offlist'),
            Column::add()->title('จำนวน')->field('countday_offlist')->headerAttribute('class' , 'text-center')->bodyAttribute('class' , 'text-center'),
            Column::add()->title('หมายเหตุ')->field('comment_offlist'),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert('.$rowId.')');
    // }

    // public function actions(EmployeeHoliday $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}

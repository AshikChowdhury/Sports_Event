<?php

namespace App\Models\TransEvent\Traits\Attribute;

use Carbon\Carbon;

/**
 * Trait TransEventAttribute.
 */
trait TransEventAttribute
{

    /**
     * @param $value
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }
    /**
     * @param $value
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }
    /**
     * @return Carbon
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * @return Carbon
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<span class='badge badge-success'>" . __('labels.general.active') . '</span>';
        }

        return "<span class='badge badge-danger'>" . __('labels.general.inactive') . '</span>';
    }


    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="' . route('admin.setup.events.show', $this) . '" class="btn btn-info"><i style="margin-top: 5px" class="fa fa-search" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.view') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.setup.events.edit', $this) . '" class="btn btn-primary"><i style="margin-top: 5px" class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        switch ($this->status) {
            case 0:
                return '<a href="' . route('admin.setup.events.mark', [
                        $this,
                        1,
                    ]) . '" class="dropdown-item">Active</a> ';
            // No break

            case 1:
                return '<a href="' . route('admin.setup.events.mark', [
                        $this,
                        0,
                    ]) . '" class="dropdown-item">Deactivate</a> ';
            // No break

            default:
                return '';
            // No break
        }
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != auth()->id() && $this->id != 1) {
            return '<a href="' . route('admin.auth.user.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . __('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
                 data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
                 class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.delete-permanently', $this) . '" name="confirm_item" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.auth.user.restore', $this) . '" name="confirm_item" class="btn btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.access.users.restore_user') . '"></i></a> ';
    }

    public function getScheduleButtonAttribute()
    {
        return '<a href="' . route('admin.setup.events.schedule.create', $this) . '" class="btn btn-success"><i style="margin-top: 5px" class="fa fa-clock-o" data-toggle="tooltip" data-placement="top" title="Schedule"></i></a>';
    }

    public function getTeamSponsorButtonAttribute()
    {
        return '<a href="' . route('admin.setup.events.team_sponsor.create', $this) . '" class="btn btn-warning"><i style="margin-top: 5px" class="fa fa-plus-circle" data-toggle="tooltip" data-placement="top" title="Add Team Sponsor"></i></a>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
				<div class="btn-group btn-group-sm" role="group" aria-label="Event Actions">
				  ' . $this->restore_button . '
				  ' . $this->delete_permanently_button . '
				</div>';
        }

        return '
    	<div class="btn-group btn-group-sm" role="group" aria-label="Event Actions">
		  ' . $this->show_button . '
		  ' . $this->edit_button . '
		  ' . $this->schedule_button . '
		  ' . $this->team_sponsor_button . '
		
		  <div class="btn-group" role="group">
			<button id="eventActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  More
			</button>
			<div class="dropdown-menu" aria-labelledby="eventActions">
			  ' . $this->status_button . '
			</div>
		  </div>
		</div>';
    }
}

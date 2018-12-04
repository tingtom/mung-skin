<?php
//
// ZoneMinder web bandwidth view file, $Date$, $Revision$
// Copyright (C) 2001-2008 Philip Coombes
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
//

$newBandwidth = $_COOKIE['zmBandwidth'];

if ( $user && !empty($user['MaxBandwidth']) )
{
    if ( $user['MaxBandwidth'] == "low" )
    {
        unset( $bandwidth_options['high'] );
        unset( $bandwidth_options['medium'] );
    }
    elseif ( $user['MaxBandwidth'] == "medium" )
    {
        unset( $bandwidth_options['high'] );
    }
}
?>

<div id="modalBandwidth" class="modal fade">
    <form class="form-horizontal" name="contentForm" id="contentForm" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo translate('Bandwidth') ?></h2>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="view" value="none"/>
                    <input type="hidden" name="action" value="bandwidth"/>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="newBandwidth" class="control-label"><?php echo translate('SetNewBandwidth') ?></label>
                        </div>
                        
                        <div class="col-sm-6">
                            <select id="newBandwidth" name="newBandwidth" class="form-control">

                            <?php foreach ( $bandwidth_options as $contentValue => $contentText ) { ?>
                                <option value="<?php echo $contentValue ?>"<?php if ( $newBandwidth == $contentValue ) { ?> selected="selected"<?php } ?>><?php echo $contentText ?></option>
                            <?php } ?>
                            
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="btnApplyBandwidth"><?php echo translate('Save') ?></button>
                </div>
            </div>
        </div>
    </form>
</div>
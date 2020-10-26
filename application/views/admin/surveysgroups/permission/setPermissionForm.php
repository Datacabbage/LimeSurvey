<?php
    App()->getClientScript()->registerPackage('jquery-tablesorter');
    App()->getClientScript()->registerScriptFile(App()->getConfig('adminscripts').'surveypermissions.js');
?>
<?php echo CHtml::beginForm(
    array("admin/surveysgroups/sa/permissionsSave", 'id'=>$model->gsid),
    'post',
    array('class'=>'usersurveypermissions') // Class used by surveypermissions
); ?>
    <h2 class="pagetitle h3"><?php if($type == 'user') {
        printf(gT("Set permission for user : %s"),"<em>".CHtml::encode($oUser->users_name)."</em>");
    }else {
        printf(gT("Set permission for user group : %s"),"<em>".CHtml::encode($oUserGroup->name)."</em>");
    } ?></h2>
    <table class='table table-striped table-permissions-set'>
        <thead>
            <tr>
                <th></th>
                <th>
                    <?php eT("Permission");?>
                </th>
                <th>
                    <input type="checkbox" class="markall" name='markall' />
                    <input type='button' id='btnToggleAdvanced' value='<<' class='btn btn-default' />
                </th>
                <th class='extended'><?php eT("Create");?></th>
                <th class='extended'><?php eT("View/read");?></th>
                <th class='extended'><?php eT("Update");?></th>
                <th class='extended'><?php eT("Delete");?></th>
                <th class='extended'><?php eT("Import");?></th>
                <th class='extended'><?php eT("Export");?></th>
            </tr>
        </thead>
        <tbody><?php foreach ($aPermissions as $sPermission => $aCurrentPermissions): ?>
            <tr>
                <td><?= $aCurrentPermissions['description'] ?></td>
                <td><?= $aCurrentPermissions['title'] ?></td>
                <td><?php echo CHtml::checkBox("all_$sPermission",false, array('class' => 'markrow')) ?></td>
                <?php foreach ($aCurrentPermissions['current'] as $sKey =>$aValues): ?>
                <td class='extended'><?php if($aCurrentPermissions[$sKey]) {
                    echo CHtml::checkBox(
                        "all_{$sPermission}_{$sKey}",
                        false,
                        array(
                            'data-indeterminate' => false
                        )
                    );
                    }?>
                </td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?></tbody>
    </table>
</form>

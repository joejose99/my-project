Public Class frmTransaction

    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click

        frmEditMember.MdiParent = mdiChurch
        frmEditMember.Show()
        frmEditMember.BringToFront()

        frmEditMember.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        frmEmployee.MdiParent = mdiChurch
        frmEmployee.Show()
        frmEmployee.BringToFront()

        frmEmployee.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button4.Click

        frmEmployee_Display.MdiParent = mdiChurch
        frmEmployee_Display.Show()
        frmEmployee_Display.BringToFront()

        frmEmployee_Display.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button5_Click(ByVal sender As System.Object, ByVal e As System.EventArgs)

    End Sub
    Private Sub Button6_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button6.Click
        frmOffering.MdiParent = mdiChurch
        frmOffering.Show()
        frmOffering.BringToFront()

        frmOffering.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button7_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button7.Click
        frmWorkers.MdiParent = mdiChurch
        frmWorkers.Show()
        frmWorkers.BringToFront()

        frmWorkers.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button8_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button8.Click


        frmSalary.MdiParent = mdiChurch
        frmSalary.Show()
        frmSalary.BringToFront()

        frmSalary.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button9_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button9.Click

        frmEditWorkers.MdiParent = mdiChurch
        frmEditWorkers.Show()
        frmEditWorkers.BringToFront()

        frmEditWorkers.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        frmAddMember.MdiParent = mdiChurch
        frmAddMember.Show()
        frmAddMember.BringToFront()

        frmAddMember.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button10_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button10.Click
        frmTithe.MdiParent = mdiChurch
        frmTithe.Show()
        frmTithe.BringToFront()

        frmTithe.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button11_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button11.Click


        frmOtherExp.MdiParent = mdiChurch
        frmOtherExp.Show()
        frmOtherExp.BringToFront()

        frmOtherExp.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button13_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button13.Click
        frmAcct.MdiParent = mdiChurch
        frmAcct.Show()
        frmAcct.BringToFront()

        frmAcct.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button14_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button14.Click
        frmChildren.MdiParent = mdiChurch
        frmChildren.Show()
        frmChildren.BringToFront()

        frmChildren.WindowState = FormWindowState.Normal

    End Sub
    Private Sub Button12_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button12.Click
        frmPledge.MdiParent = mdiChurch
        frmPledge.Show()
        frmPledge.BringToFront()

        frmPledge.WindowState = FormWindowState.Normal

    End Sub
End Class
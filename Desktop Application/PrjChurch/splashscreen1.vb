Public Class splashscreen1

    Private ctr As Integer
    Private Sub Timer1_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Timer1.Tick
       
        If Timer1.Interval = 200 Then

            Timer1.Enabled = False
            Me.Close()
            frmLogin.Show()

        End If
        If Timer1.Interval = 100 Then
            Version.Text = "."
        End If
        If Timer1.Interval = 110 Then
            Version.Text = ".."
        End If
        If Timer1.Interval = 120 Then
            Version.Text = "..."
        End If
        If Timer1.Interval = 130 Then
            Version.Text = "...."
        End If
        If Timer1.Interval = 140 Then
            Version.Text = "....."
        End If
        If Timer1.Interval = 150 Then
            Version.Text = "......"
        End If
        If Timer1.Interval = 160 Then
            Version.Text = "......."
        End If
        If Timer1.Interval = 170 Then
            Version.Text = "........"
        End If
        If Timer1.Interval = 180 Then
            Version.Text = "........"
        End If
        If Timer1.Interval = 190 Then
            Version.Text = "........."
        End If

        If Timer1.Interval = 199 Then
            Version.Text = ".........."
            Me.Visible = False
        End If
        ctr = ctr + 1
        Timer1.Interval = ctr

    End Sub

    Private Sub splashscreen1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.ControlBox = False
        mdiChurch.Show()

        mdiChurch.ChurchToolStripMenuItem.Visible = False
        mdiChurch.EmployeeToolStripMenuItem.Visible = False

        mdiChurch.SalaryToolStripMenuItem.Visible = False

        mdiChurch.DepartmentToolStripMenuItem.Visible = False
        mdiChurch.PaymentToolStripMenuItem.Visible = False

        mdiChurch.PaymentReportToolStripMenuItem.Visible = False

        mdiChurch.AccountToolStripMenuItem.Visible = False
        mdiChurch.ManageDataToolStripMenuItem.Visible = False
        mdiChurch.LoginDetailsToolStripMenuItem.Visible = False

        Timer1.Interval = 100
        Timer1.Enabled = True
    End Sub
End Class
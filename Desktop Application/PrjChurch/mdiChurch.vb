Imports System.Windows.Forms
Imports System.Data.SqlClient
Imports System.IO
Imports System.Drawing
Imports System.Drawing.Drawing2D
Imports System.Drawing.Imaging
Imports System.Drawing.Text
Imports System.Drawing.Printing
Imports System.Data.OleDb

Public Class mdiChurch

    Private Sub AddMemberToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddMemberToolStripMenuItem.Click
        frmAddMember.MdiParent = Me

        frmAddMember.Show()

        frmAddMember.BringToFront()
        frmAddMember.WindowState = FormWindowState.Normal
    End Sub

    Private Sub mdiChurch_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try

            Me.IsMdiContainer = True


            Me.WindowState = FormWindowState.Maximized
            Me.AutoScroll = False

            Me.VScroll = False
            Me.HorizontalScroll.Maximum = 0
            Me.HorizontalScroll.Visible = False
            Me.VerticalScroll.Visible = False
            frmLogin.MdiParent = Me
            'frmlogout.MdiParent = Me
            splashscreen1.MdiParent = Me
            frmTransacton.MdiParent = Me

            Me.HScroll = False
            Me.VScroll = False
            Me.AutoScroll = False
            Me.AutoScrollMargin.Equals(0)
            Me.AutoScrollPosition.Equals(0)



            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [School_Name]"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim rowses As Integer
            While myAccessReader.Read
                rowses = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            If rowses <> 0 Then
                Label1.Text = ""
                conns()

                str_sql_user_select = "SELECT * FROM  School_Name "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ros As Integer = 0
                While myAccessReader.Read()


                    School_name = myAccessReader("vSC_Name")
                    Label1.Text = School_name

                    ros += 1

                End While
                strconss.Close()

            End If






            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub EditMemberToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditMemberToolStripMenuItem.Click


        frmEditMember.MdiParent = Me

        frmEditMember.Show()

        frmEditMember.BringToFront()
        frmEditMember.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditChildrenToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditChildrenToolStripMenuItem.Click
        frmChildren.MdiParent = Me

        frmChildren.Show()

        frmChildren.BringToFront()
        frmChildren.WindowState = FormWindowState.Normal
    End Sub

    Private Sub ChurchToolStripMenuItem1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ChurchToolStripMenuItem1.Click
        frmAddChurchName.MdiParent = Me

        frmAddChurchName.Show()

        frmAddChurchName.BringToFront()
        frmAddChurchName.WindowState = FormWindowState.Normal
    End Sub

    Private Sub AddDepartmentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddDepartmentToolStripMenuItem.Click
        frmAddDepart.MdiParent = Me

        frmAddDepart.Show()

        frmAddDepart.BringToFront()
        frmAddDepart.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditDepartmentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditDepartmentToolStripMenuItem.Click


        frmEditDepart.MdiParent = Me

        frmEditDepart.Show()

        frmEditDepart.BringToFront()
        frmEditDepart.WindowState = FormWindowState.Normal
    End Sub

    Private Sub ChurchWorkersToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ChurchWorkersToolStripMenuItem.Click
        frmWorkers.MdiParent = Me

        frmWorkers.Show()

        frmWorkers.BringToFront()
        frmWorkers.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditChurchWorkersToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditChurchWorkersToolStripMenuItem.Click

        frmEditWorkers.MdiParent = Me

        frmEditWorkers.Show()

        frmEditWorkers.BringToFront()
        frmEditWorkers.WindowState = FormWindowState.Normal
    End Sub

    Private Sub CurrencyToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CurrencyToolStripMenuItem.Click
        frmCurrency.MdiParent = Me

        frmCurrency.Show()

        frmCurrency.BringToFront()
        frmCurrency.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PaymentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PaymentToolStripMenuItem.Click

    End Sub

    Private Sub OfferingToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles OfferingToolStripMenuItem.Click
        frmOffering.MdiParent = Me

        frmOffering.Show()

        frmOffering.BringToFront()
        frmOffering.WindowState = FormWindowState.Normal
    End Sub

    Private Sub CancelOfferingToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CancelOfferingToolStripMenuItem.Click

        frmCancelOffering.MdiParent = Me

        frmCancelOffering.Show()

        frmCancelOffering.BringToFront()
        frmCancelOffering.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PrintOfferingToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintOfferingToolStripMenuItem.Click
        frmOfferingRp.MdiParent = Me

        frmOfferingRp.Show()

        frmOfferingRp.BringToFront()
        frmOfferingRp.WindowState = FormWindowState.Normal
    End Sub

    Private Sub OtherExpensesToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles OtherExpensesToolStripMenuItem.Click

        frmOtherExp.MdiParent = Me

        frmOtherExp.Show()

        frmOtherExp.BringToFront()
        frmOtherExp.WindowState = FormWindowState.Normal
    End Sub

    Private Sub CancelOtherExpensesToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CancelOtherExpensesToolStripMenuItem.Click

        frmOtherExpCan.MdiParent = Me

        frmOtherExpCan.Show()

        frmOtherExpCan.BringToFront()
        frmOtherExpCan.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PrintOtherExpensesToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintOtherExpensesToolStripMenuItem.Click
       
        frmOtherExpRp.MdiParent = Me

        frmOtherExpRp.Show()

        frmOtherExpRp.BringToFront()
        frmOtherExpRp.WindowState = FormWindowState.Normal
    End Sub

    Private Sub AccountToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AccountToolStripMenuItem.Click

        frmAcct.MdiParent = Me

        frmAcct.Show()

        frmAcct.BringToFront()
        frmAcct.WindowState = FormWindowState.Normal
    End Sub

    Private Sub TitheToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TitheToolStripMenuItem.Click
        frmTithe.MdiParent = Me

        frmTithe.Show()

        frmTithe.BringToFront()
        frmTithe.WindowState = FormWindowState.Normal
    End Sub

    Private Sub CancelTitheToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CancelTitheToolStripMenuItem.Click
        frmTitheCan.MdiParent = Me

        frmTitheCan.Show()

        frmTitheCan.BringToFront()
        frmTitheCan.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PrintTitheToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintTitheToolStripMenuItem.Click
        frmTitheRp.MdiParent = Me

        frmTitheRp.Show()

        frmTitheRp.BringToFront()
        frmTitheRp.WindowState = FormWindowState.Normal
    End Sub

    
    Private Sub RedeemVowToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RedeemVowToolStripMenuItem.Click


        frmPledge.MdiParent = Me

        frmPledge.Show()

        frmPledge.BringToFront()
        frmPledge.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditPledgeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditPledgeToolStripMenuItem.Click



        frmPledgeEdit.MdiParent = Me

        frmPledgeEdit.Show()

        frmPledgeEdit.BringToFront()
        frmPledgeEdit.WindowState = FormWindowState.Normal
    End Sub

    Private Sub RedeemPledgeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles RedeemPledgeToolStripMenuItem.Click
        frmPledgeRedeem.MdiParent = Me

        frmPledgeRedeem.Show()

        frmPledgeRedeem.BringToFront()
        frmPledgeRedeem.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PrintRedeemPledgeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintRedeemPledgeToolStripMenuItem.Click

        frmPledgeRp.MdiParent = Me

        frmPledgeRp.Show()

        frmPledgeRp.BringToFront()
        frmPledgeRp.WindowState = FormWindowState.Normal
    End Sub

    Private Sub CancelRedeemPledgeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CancelRedeemPledgeToolStripMenuItem.Click

        frmRedeemPlCan.MdiParent = Me

        frmRedeemPlCan.Show()

        frmRedeemPlCan.BringToFront()
        frmRedeemPlCan.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PaySalaryToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PaySalaryToolStripMenuItem.Click

        frmSalary.MdiParent = Me

        frmSalary.Show()

        frmSalary.BringToFront()
        frmSalary.WindowState = FormWindowState.Normal

    End Sub

    Private Sub AddEmployeeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddEmployeeToolStripMenuItem.Click
        frmEmployee.MdiParent = Me

        frmEmployee.Show()

        frmEmployee.BringToFront()
        frmEmployee.WindowState = FormWindowState.Normal
    End Sub

    Private Sub AddEmployeeDepartmentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddEmployeeDepartmentToolStripMenuItem.Click

        frmEmpDepart.MdiParent = Me

        frmEmpDepart.Show()

        frmEmpDepart.BringToFront()
        frmEmpDepart.WindowState = FormWindowState.Normal
    End Sub

    Private Sub AddSalaryGradeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles AddSalaryGradeToolStripMenuItem.Click


        frmsalGrade.MdiParent = Me

        frmsalGrade.Show()

        frmsalGrade.BringToFront()
        frmsalGrade.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditEmployeeDepartmentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditEmployeeDepartmentToolStripMenuItem.Click

        frmEmpEdit.MdiParent = Me

        frmEmpEdit.Show()

        frmEmpEdit.BringToFront()
        frmEmpEdit.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditSalaryGradeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditSalaryGradeToolStripMenuItem.Click

        frmSalGradeEdit.MdiParent = Me

        frmSalGradeEdit.Show()

        frmSalGradeEdit.BringToFront()
        frmSalGradeEdit.WindowState = FormWindowState.Normal
    End Sub

    Private Sub EditEmployeeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditEmployeeToolStripMenuItem.Click

        frmEmployee_Display.MdiParent = Me

        frmEmployee_Display.Show()

        frmEmployee_Display.BringToFront()
        frmEmployee_Display.WindowState = FormWindowState.Normal
    End Sub

    
    Private Sub SalaToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles SalaToolStripMenuItem.Click

        frmsalYearRep.MdiParent = Me

        frmsalYearRep.Show()

        frmsalYearRep.BringToFront()
        frmsalYearRep.WindowState = FormWindowState.Normal

    End Sub

    Private Sub EditSalaryToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EditSalaryToolStripMenuItem.Click


        frmSalary_Cancel.MdiParent = Me

        frmSalary_Cancel.Show()

        frmSalary_Cancel.BringToFront()
        frmSalary_Cancel.WindowState = FormWindowState.Normal

    End Sub

    Private Sub PrintIndividualSalaryToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintIndividualSalaryToolStripMenuItem.Click


        frmsalReport.MdiParent = Me

        frmsalReport.Show()

        frmsalReport.BringToFront()
        frmsalReport.WindowState = FormWindowState.Normal

    End Sub

   
    Private Sub ExitToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ExitToolStripMenuItem.Click
        Dim Choice As String
        Choice = MsgBox("Are you sure you want to Close ?", vbYesNo + vbInformation, "Information")
        If Choice = vbYes Then

            frmLoginServer.Close()
        End If
    End Sub

    Private Sub ChurchToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ChurchToolStripMenuItem.Click

    End Sub

    Private Sub EmployeeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles EmployeeToolStripMenuItem.Click

    End Sub

   

    Private Sub LoginDetailsToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles LoginDetailsToolStripMenuItem.Click

        frmLoginEdit.MdiParent = Me

        frmLoginEdit.Show()

        frmLoginEdit.BringToFront()
        frmLoginEdit.WindowState = FormWindowState.Normal

    End Sub

    Private Sub DepartmentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DepartmentToolStripMenuItem.Click

    End Sub

    Private Sub PaymentReportToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PaymentReportToolStripMenuItem.Click

    End Sub

    Private Sub LogOutToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles LogOutToolStripMenuItem.Click
        Dim Choice As String
        Choice = MsgBox("Are you sure you want to Log Out ?", vbYesNo + vbInformation, "Information")
        If Choice = vbYes Then

            frmAcct.Close()
            frmAddChurchName.Close()
            frmAddDepart.Close()
            frmAddMember.Close()
            frmCancelOffering.Close()
            frmChildren.Close()
            frmCurrency.Close()
            frmDeferRestor.Close()
            frmDptPuup.Close()
            frmEditDepart.Close()
            frmEditMember.Close()
            frmEditWorkers.Close()
            frmEmpEdit.Close()
            frmEmployee.Close()
            frmEmployee_Display.Close()
            frmEmpsalpuup.Close()
            frmEmpsalpuup.Close()
            frmEmpSearch.Close()
            frmLoginEdit.Close()
            frmMemberPuup.Close()
            frmOffering.Close()
            frmOfferingRp.Close()
            frmOtherExp.Close()
            frmOtherExpCan.Close()
            frmOtherExpRp.Close()
            frmPledge.Close()
            frmPledgeEdit.Close()
            frmPledgePuup.Close()
            frmPledgeRedeem.Close()
            frmPledgeRp.Close()
            frmRedeemPlCan.Close()
            frmSalary.Close()
            frmSalary_Cancel.Close()
            frmsalGrade.Close()
            frmSalGradeEdit.Close()
            frmSalpuup.Close()
            frmsalReport.Close()
            frmsalYearRep.Close()
            frmTithe.Close()
            frmTitheCan.Close()
            frmTitheRp.Close()
            frmWorkers.Close()
            frmBack.Close()
            frmEmpDepart.Close()
            frmComment.Close()
            frmCommentRP.Close()
            frmincome.Close()
            frmIncomeEdit.Close()
            frmCancelOtherIcome.Close()
            frmLogin.MdiParent = Me

          
            frmLogin.Show()

            frmLogin.BringToFront()
            frmLogin.WindowState = FormWindowState.Normal

        End If
    End Sub

    Private Sub BackUpFileToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles BackUpFileToolStripMenuItem.Click
        frmBack.MdiParent = Me

        frmBack.Show()

        frmBack.BringToFront()
        frmBack.WindowState = FormWindowState.Normal

    End Sub

    Private Sub CommentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CommentToolStripMenuItem.Click
        frmComment.MdiParent = Me

        frmComment.Show()

        frmComment.BringToFront()
        frmComment.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PrintCommentToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintCommentToolStripMenuItem.Click
        frmCommentRP.MdiParent = Me

        frmCommentRP.Show()

        frmCommentRP.BringToFront()
        frmCommentRP.WindowState = FormWindowState.Normal
    End Sub

    Private Sub OtherIncomeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles OtherIncomeToolStripMenuItem.Click
        frmincome.MdiParent = Me

        frmincome.Show()

        frmincome.BringToFront()
        frmincome.WindowState = FormWindowState.Normal
    End Sub

    Private Sub PrintOtherIncomeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintOtherIncomeToolStripMenuItem.Click
        frmIncomeEdit.MdiParent = Me

        frmIncomeEdit.Show()

        frmIncomeEdit.BringToFront()
        frmIncomeEdit.WindowState = FormWindowState.Normal
    End Sub

    Private Sub CancelOtherIncomeToolStripMenuItem_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CancelOtherIncomeToolStripMenuItem.Click
        frmCancelOtherIcome.MdiParent = Me

        frmCancelOtherIcome.Show()

        frmCancelOtherIcome.BringToFront()
        frmCancelOtherIcome.WindowState = FormWindowState.Normal
    End Sub
End Class

Imports System.Data.OleDb

Public Class frmLogin


    Private Sub frmLogin_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            ' Me.Height = 215
            ' Me.Width = 329
            ctrTran = 0

            Me.FormBorderStyle = Windows.Forms.FormBorderStyle.None

            'Me.StartPosition = FormStartPosition.CenterScreen

            'mdiChurch.IsMdiContainer = True
            'Me.MdiParent = mdiChurch

            Me.StartPosition = FormStartPosition.CenterScreen

            'With Me
            '.Left = 400
            ' .Top = 500
            'End With
            mdiChurch.Show()
            mdiChurch.PrintCommentToolStripMenuItem.Visible = False
            mdiChurch.CommentToolStripMenuItem.Visible = False


            mdiChurch.ChurchToolStripMenuItem.Visible = False
            mdiChurch.EmployeeToolStripMenuItem.Visible = False

            mdiChurch.SalaryToolStripMenuItem.Visible = False

            mdiChurch.DepartmentToolStripMenuItem.Visible = False
            mdiChurch.PaymentToolStripMenuItem.Visible = False

            mdiChurch.PaymentReportToolStripMenuItem.Visible = False

            mdiChurch.AccountToolStripMenuItem.Visible = False
            mdiChurch.ManageDataToolStripMenuItem.Visible = False
            mdiChurch.LoginDetailsToolStripMenuItem.Visible = False



            frmTransacton.Button3.Visible = False
            frmTransacton.Button1.Visible = False
            frmTransacton.Button2.Visible = False


            frmTransacton.Button7.Visible = False
            frmTransacton.Button8.Visible = False
            frmTransacton.Button10.Visible = False
            frmTransacton.Button14.Visible = False
            frmTransacton.Button13.Visible = False
            frmTransacton.Button4.Visible = False
            frmTransacton.Button6.Visible = False

            'frmTransacton.Button5.Enabled = True

            frmTransacton.Button9.Visible = False
            'frmTransacton.Button4.Enabled = True
            frmTransacton.Button11.Visible = False
            frmTransacton.Button12.Visible = False


            Me.Height = 181
            Me.Width = 319

            Call conns()
            Dim fname As String

            str_sql_user_select = "SELECT * FROM  [Church] "
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            'Dim rows As Integer




            While myAccessReader.Read
                fname = myAccessReader("vFname")

            End While
            myAccessReader.Close()
            strconss.Close()



        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
            frmLoginServer.Visible = True
            errTime += 1
            Exit Sub

        End Try
    End Sub

    Private Sub butConnect_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butConnect.Click

        Try

            ctrTran = 0
            If TextBox1.Text = "sa" And TextBox2.Text = "sa" And ComboBox2.Text = "99" Then

                mdiChurch.ChurchToolStripMenuItem.Visible = True
                mdiChurch.EmployeeToolStripMenuItem.Visible = True

                mdiChurch.SalaryToolStripMenuItem.Visible = True

                mdiChurch.DepartmentToolStripMenuItem.Visible = True
                mdiChurch.PaymentToolStripMenuItem.Visible = True

                mdiChurch.PaymentReportToolStripMenuItem.Visible = True

                mdiChurch.AccountToolStripMenuItem.Visible = True
                mdiChurch.ManageDataToolStripMenuItem.Visible = True
                mdiChurch.LoginDetailsToolStripMenuItem.Visible = True

                frmTransacton.Button3.Visible = True
                frmTransacton.Button1.Visible = True
                frmTransacton.Button2.Visible = True


                frmTransacton.Button7.Visible = True
                frmTransacton.Button8.Visible = True
                frmTransacton.Button10.Visible = True
                frmTransacton.Button14.Visible = True
                frmTransacton.Button13.Visible = True
                frmTransacton.Button4.Visible = True
                frmTransacton.Button6.Visible = True

                'frmTransacton.Button5.Enabled = True

                frmTransacton.Button9.Visible = True
                'frmTransacton.Button4.Enabled = True
                frmTransacton.Button11.Visible = True
                frmTransacton.Button12.Visible = True
                mdiChurch.PrintCommentToolStripMenuItem.Visible = True
                mdiChurch.CommentToolStripMenuItem.Visible = True


                mdiChurch.PrintOtherIncomeToolStripMenuItem.Visible = True
                mdiChurch.CancelOtherIncomeToolStripMenuItem.Visible = True
                mdiChurch.OtherIncomeToolStripMenuItem.Visible = True

                Me.Close()
                ctrTran = 1
                Exit Sub
            End If
            ' If ComboBox2.Text = "Teaching Staff" Then

            'logTeacher = "Teaching Staff"
            ' End If


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
                conns()

                str_sql_user_select = "SELECT * FROM  School_Name "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ros As Integer = 0
                While myAccessReader.Read()


                    School_name = myAccessReader("vSC_Name")

                    ros += 1

                End While
                strconss.Close()

            End If


            Call conns()

            str_sql_user_select = "SELECT vuserName,vPassoward,vRole,vActtionE,vActtionExp,vActtionLoc FROM login "

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim ro As Integer = 0
            While myAccessReader.Read()

                UserN = myAccessReader("vuserName")

                If Trim(myAccessReader("vuserName")) & "" = Trim(TextBox1.Text) & "" And Trim(myAccessReader("vPassoward")) & "" = Trim(TextBox2.Text) And Trim(myAccessReader("vRole")) & "" = Trim(ComboBox2.Text) & "" And Trim(myAccessReader("vActtionE")) & "" = "Enable" And Trim(myAccessReader("vActtionExp")) & "" = "Restore" And Trim(myAccessReader("vActtionLoc")) & "" = "Unlock" Then
                    If Trim(myAccessReader("vRole")) & "" = "Pastor" Then
                        frmTransacton.Show()




                        frmTransacton.Button3.Visible = True
                        frmTransacton.Button1.Visible = True
                        frmTransacton.Button2.Visible = True


                        frmTransacton.Button7.Visible = True
                        frmTransacton.Button8.Visible = True
                        frmTransacton.Button10.Visible = True
                        frmTransacton.Button14.Visible = True
                        frmTransacton.Button13.Visible = True
                        frmTransacton.Button4.Visible = True
                        frmTransacton.Button6.Visible = True

                        'frmTransacton.Button5.Enabled = True

                        frmTransacton.Button9.Visible = True
                        'frmTransacton.Button4.Enabled = True
                        frmTransacton.Button11.Visible = True
                        frmTransacton.Button12.Visible = True

                        mdiChurch.CancelOtherIncomeToolStripMenuItem.Visible = True
                        mdiChurch.PrintCommentToolStripMenuItem.Visible = True
                        mdiChurch.CommentToolStripMenuItem.Visible = True


                        mdiChurch.ChurchToolStripMenuItem.Visible = True
                        mdiChurch.EmployeeToolStripMenuItem.Visible = True

                        mdiChurch.SalaryToolStripMenuItem.Visible = True

                        mdiChurch.DepartmentToolStripMenuItem.Visible = True
                        mdiChurch.PaymentToolStripMenuItem.Visible = True

                        mdiChurch.PaymentReportToolStripMenuItem.Visible = True

                        mdiChurch.AccountToolStripMenuItem.Visible = True
                        mdiChurch.ManageDataToolStripMenuItem.Visible = True
                        mdiChurch.LoginDetailsToolStripMenuItem.Visible = True


                        '############ Administrator
                        mdiChurch.EditSalaryToolStripMenuItem.Visible = True
                        mdiChurch.CancelOfferingToolStripMenuItem.Visible = True
                        mdiChurch.CancelOtherExpensesToolStripMenuItem.Visible = True
                        mdiChurch.CancelTitheToolStripMenuItem.Visible = True
                        mdiChurch.CancelRedeemPledgeToolStripMenuItem.Visible = True
                        mdiChurch.ManageDataToolStripMenuItem.Visible = True

                        '############ Secretary
                        mdiChurch.PaymentToolStripMenuItem.Visible = True
                        mdiChurch.AccountToolStripMenuItem.Visible = True
                        mdiChurch.SalaryToolStripMenuItem.Visible = True

                        mdiChurch.PrintOtherIncomeToolStripMenuItem.Visible = True
                        mdiChurch.CancelOtherIncomeToolStripMenuItem.Visible = True
                        mdiChurch.OtherIncomeToolStripMenuItem.Visible = True


                        Me.Close()
                        ctrTran = 1
                        Exit Sub
                    End If

                    'ElseIf myreader("vuserName") = Trim(TextBox1.Text) & "" And myreader("vPassoward") = Trim(TextBox2.Text) And myreader("vRole") = Trim(ComboBox2.Text) & "" And myreader("vActtionE") = "Enable" And myreader("vActtionExp") = "Restore" And myreader("vActtionLoc") = "Unlock" Then
                    If Trim(myAccessReader("vRole")) & "" = "Administrator" Then

                        frmTransacton.Show()


                        frmTransacton.Button3.Visible = True
                        frmTransacton.Button1.Visible = True
                        frmTransacton.Button2.Visible = True


                        frmTransacton.Button7.Visible = True
                        frmTransacton.Button8.Visible = True
                        frmTransacton.Button10.Visible = True
                        frmTransacton.Button14.Visible = True
                        frmTransacton.Button13.Visible = True
                        frmTransacton.Button4.Visible = True
                        frmTransacton.Button6.Visible = True

                        'frmTransacton.Button5.Enabled = True

                        frmTransacton.Button9.Visible = True
                        'frmTransacton.Button4.Enabled = True
                        frmTransacton.Button11.Visible = True
                        frmTransacton.Button12.Visible = True


                        mdiChurch.PrintCommentToolStripMenuItem.Visible = True
                        mdiChurch.CommentToolStripMenuItem.Visible = True

                        mdiChurch.ChurchToolStripMenuItem.Visible = True
                        mdiChurch.EmployeeToolStripMenuItem.Visible = True

                        mdiChurch.DepartmentToolStripMenuItem.Visible = True

                        mdiChurch.PaymentReportToolStripMenuItem.Visible = True


                        mdiChurch.LogOutToolStripMenuItem.Enabled = True

                        mdiChurch.EditSalaryToolStripMenuItem.Visible = False

                        mdiChurch.CancelOfferingToolStripMenuItem.Visible = False

                        mdiChurch.CancelOtherExpensesToolStripMenuItem.Visible = False
                        mdiChurch.CancelOtherIncomeToolStripMenuItem.Visible = False

                        mdiChurch.CancelTitheToolStripMenuItem.Visible = False

                        mdiChurch.CancelRedeemPledgeToolStripMenuItem.Visible = False

                        mdiChurch.DepartmentToolStripMenuItem.Enabled = True
                        mdiChurch.ManageDataToolStripMenuItem.Visible = False

                        mdiChurch.PrintOtherIncomeToolStripMenuItem.Visible = True
                        mdiChurch.CancelOtherIncomeToolStripMenuItem.Visible = False
                        mdiChurch.OtherIncomeToolStripMenuItem.Visible = True


                        mdiChurch.PaymentToolStripMenuItem.Visible = True
                        mdiChurch.AccountToolStripMenuItem.Visible = True
                        mdiChurch.SalaryToolStripMenuItem.Visible = True
                        mdiChurch.LoginDetailsToolStripMenuItem.Visible = False



                        Me.Close()
                        ctrTran = 1
                        Exit Sub
                    End If


                    'ElseIf myreader("vuserName") = Trim(TextBox1.Text) & "" And myreader("vPassoward") = Trim(TextBox2.Text) And myreader("vRole") = Trim(ComboBox2.Text) & "" And myreader("vActtionE") = "Enable" And myreader("vActtionExp") = "Restore" And myreader("vActtionLoc") = "Unlock" Then
                    If Trim(myAccessReader("vRole")) & "" = "Secretary" Then

                        frmTransacton.Show()


                        frmTransacton.Button3.Visible = True
                        frmTransacton.Button1.Visible = True
                        frmTransacton.Button2.Visible = True
                        frmTransacton.Button10.Visible = True
                        frmTransacton.Button4.Visible = True
                        frmTransacton.Button11.Visible = True
                        frmTransacton.Button6.Visible = True


                        frmTransacton.Button14.Visible = False
                        frmTransacton.Button7.Visible = False
                        frmTransacton.Button9.Visible = False

                        frmTransacton.Button8.Visible = False
                      frmTransacton.Button12.Visible = False
                        frmTransacton.Button13.Visible = False


                        mdiChurch.ChurchToolStripMenuItem.Visible = True
                        mdiChurch.EmployeeToolStripMenuItem.Visible = True

                        mdiChurch.DepartmentToolStripMenuItem.Visible = True

                        mdiChurch.PaymentReportToolStripMenuItem.Visible = True


                        mdiChurch.LogOutToolStripMenuItem.Enabled = True

                        mdiChurch.EditSalaryToolStripMenuItem.Visible = False

                        mdiChurch.CancelOfferingToolStripMenuItem.Visible = False

                        mdiChurch.CancelOtherExpensesToolStripMenuItem.Visible = False

                        mdiChurch.CancelTitheToolStripMenuItem.Visible = False
                       

                        mdiChurch.CancelRedeemPledgeToolStripMenuItem.Visible = False

                        mdiChurch.DepartmentToolStripMenuItem.Enabled = True
                        mdiChurch.ManageDataToolStripMenuItem.Visible = False

                        mdiChurch.PrintOtherIncomeToolStripMenuItem.Visible = False
                        mdiChurch.CancelOtherIncomeToolStripMenuItem.Visible = False
                        mdiChurch.OtherIncomeToolStripMenuItem.Visible = False

                        mdiChurch.PaymentToolStripMenuItem.Visible = False

                        mdiChurch.AccountToolStripMenuItem.Visible = False

                        mdiChurch.ManageDataToolStripMenuItem.Visible = False

                        mdiChurch.SalaryToolStripMenuItem.Visible = False

                        mdiChurch.LogOutToolStripMenuItem.Enabled = True
                        mdiChurch.LoginDetailsToolStripMenuItem.Visible = False


                        

                        Me.Close()
                        ctrTran = 1
                        Exit Sub
                    End If

                End If

                ro = ro + 1
            End While

            MsgBox("Invalid User Name or Password, try again!", MsgBoxStyle.Information, "Login")
            ctrTran = 0
            TextBox1.Text = ""
            TextBox2.Text = ""

            ComboBox2.Text = ""
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")

        End Try
    End Sub

    Private Sub Button2_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button2.Click
        Dim Choice As String
        Choice = MsgBox("Are you sure you want to Exit?", vbYesNo + vbInformation, "Information")
        If Choice = vbYes Then

            Me.Close()
            frmLoginServer.Close()
        End If
    End Sub


    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Me.TextBox1.Text = ""
        Me.TextBox2.Text = ""
        Me.ComboBox2.Text = ""
    End Sub

    Private Sub Version_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Version.Click

    End Sub
End Class